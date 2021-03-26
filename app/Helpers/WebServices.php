<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

trait WebServices
{

    /**
     * Attempt to refresh the access token used a refresh token that
     * has been saved in a cookie
     *
     */
    public function attemptRefresh()
    {
        $refreshToken = request()->cookie('refreshToken');
        return $this->handshake('refresh_token', ['refresh_token' => $refreshToken]);
    }

    /// ----------------------------------------------------------
    /// Http Handshake request to the OAuth server.
    ///
    /// At application start up, the application needs to synchronize
    /// with the server.
    /// How does this work?
    ///   - A. If a previous token exists, the latter is sent to
    ///   -   the server to be validated.  If the validation is Ok,
    ///   -   the user is re-authenticated and a new token is returned
    ///   -   to the application.  The application then stores it.
    ///
    ///   - B. If no token exists, the application sends a request
    ///   -   for a new token to the server, which returns the
    ///   -   the requested token.  This token will be saved.
    /// ---------------------------------------------------------
    /**
     * Proxy a request to the OAuth server.
     *
     * @param string $grantType what type of grant type should be proxied
     * @param array $data the data to send to the server
     */
    public function handshake($grantType, array $data = [])
    {
//        $data = [
        //            'client_id' => request()->header('X-APP-ID'),
        //            'client_secret' => request()->header('X-APP-KEY'),
        //            'username' => $data['email'],
        //            'password' => $data['password'],
        //            'grant_type'    => 'authorization_code',
        //            "scope" => "*",
        //        ];

        $header = [
            'client_id' => request()->header('X-APP-ID'),
            'username' => 'MFM',
            'client_secret' => request()->header('X-APP-KEY'),
        ];

        $query = [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => request()->header('X-APP-ID'),
                'client_secret' => request()->header('X-APP-KEY'),
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '*',
            ],
        ];
//
        //        return [
        ////                'access_token' => $data->access_token,
        ////                'expires_in' => $data->expires_in,
        //            'meta'  =>  $query
        //        ];

        $request = Request::create('/oauth/token', 'POST', $query);
//        $request = Request::create('/oauth/token','POST',$data);
        //        $request = Request::create('/oauth/token','POST',$data);

        $response = Route::dispatch($request);
//        $response = App::make('Request')->post('/oauth/token',$data,$header);
        //        $response = App::make('apiconsumer')->post('/oauth/token',$data,$header);
        // http://resources.dev/oauth/authorize?client_id={CLIENT_ID}&redirect_uri={URI}&response_type=code&scope={SCOPE}
        return [
//                'access_token' => $data->access_token,
            //                'expires_in' => $data->expires_in,
            'meta' => $response->getContent(),
        ];
        if (!$response->isSuccessful()) {
            return [
//                'access_token' => $data->access_token,
                //                'expires_in' => $data->expires_in,
                'meta' => $response->getContent(),
            ];
        }

        $data = json_decode($response->getContent());

        // Create a refresh token cookie
        $this->cookie->queue(
            'refreshToken',
            $data->refresh_token,
            864000, // 10 days
            null,
            null,
            false,
            true// HttpOnly
        );

        return [
            'access_token' => $data->access_token,
            'expires_in' => $data->expires_in,
        ];
    }
}
