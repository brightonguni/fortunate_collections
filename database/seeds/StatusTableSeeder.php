<?php

use Illuminate\Database\Seeder;
use App\Model\Status\Status;
class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Canceled – Grey
//Completed – Blue
//Failed – Red
//On Hold – Orange
//Pending Payment – Grey
//Processing – Green
//Refunded – Grey
        $users_status = [
            # user status
            array(
                'name' => 'active',
                'description'   => 'active users can log in and have full access to all the features of their account. ',
                'message'   => 'Your account is active',
                'type'   => 'user',
            ),array(
                'name' => 'unverified',
                'description'   => 'unverified users have been sent an email to verify that their email address is valid, but have not yet clicked the link in that email.',
                'message'   => 'Your account requires verification by clicking a link in your Welcome email. If you cannot find the Welcome email, you may request to have another copy sent.',
                'type'   => 'user',
            ),array(
                'name' => 'created',
                'description'   => 'created users have been added successfully to account. The user will retain unverified until they verify their email address is valid.',
                'message'   => 'Your account requires verification by clicking a link in your Welcome email. If you cannot find the Welcome email, you may request to have another copy sent.',
                'type'   => 'user',
            ),array(
                'name' => 'pending',
                'description'   => 'pending users is waiting for approval from an administrator.',
                'message'   => 'Your account is waiting for approval from an administrator. You will not be able to log in until you receive this approval. You will be notified when your account is approved or denied.',
                'type'   => 'user',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked users have been temporarily suspended by an account administrator. The user\'s profile and associated information are not deleted.  The user\'s can\'t sign in to their account until an account administrator can reactivate the suspended user account.',
                'message'   => 'Your account has been temporarily suspended by an administrator. You cannot sign in but If your account is suspended and you believe this to be in error, please contact your site\'s account administrator.',
                'type'   => 'user',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted users have been has been removed from our record. You cannot log in and you will not receive any email.',
                'message'   => 'Your account has been removed from our account records. You cannot log in ,view, purchase or receive any email.',
                'type'   => 'user',
            ),

            array(
                'name' => 'maximum',
                'description'   => 'maximum limit have full access to all the purchases not great than maximum',
                'message'   => 'Your purchase has reached maximum limit',
                'type'   => 'user',
            ),array(
                'name' => 'minimum',
                'description'   => 'minimum limit have full access to all the purchases not less than maximum',
                'message'   => 'Your purchase should not be less than  minimum amount allowed',
                'type'   => 'user',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted payment method have been removed from payment method list.',
                'message'   => 'Your payment method has been deleted from your order type list successfully.',
                'type'   => 'limit',
            ),


            # meter
            array(
                'name' => 'active',
                'description'   => 'active meters have full access to all the purchases',
                'message'   => 'Your meter is active',
                'type'   => 'meter',
            ),array(
                'name' => 'created',
                'description'   => 'created meters have been added successfully to user account.',
                'message'   => 'Your meters has been added successfully.',
                'type'   => 'meter',
            ),array(
                'name' => 'pending',
                'description'   => 'pending meters is waiting for approval from an administrator.',
                'message'   => 'Your meter is waiting for approval from an administrator. You will not be able to purchase prepaid electricity until you receive this approval. You will be notified when your meter is approved or denied.',
                'type'   => 'meter',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked meters have been temporarily suspended by an site administrator. The user\'s meters and associated information are not deleted.  The user\'s can\'t purchase electricity until an site administrator can reactivate the suspended meter.',
                'message'   => 'Your meter has been temporarily suspended by an administrator. You cannot purchase electricity but If your meter is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'meter',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted meters has been removed from our record. User cannot purchase electricity.',
                'message'   => 'Your meter has been removed from our records. You cannot view, edit or purchase electricity',
                'type'   => 'meter',
            ),

            # credit card
            array(
                'name' => 'active',
                'description'   => 'active credit card have full access to all the payments',
                'message'   => 'Your credit card is active',
                'type'   => 'credit card',
            ),array(
                'name' => 'created',
                'description'   => 'created credit card have been added successfully to user account.',
                'message'   => 'Your credit card has been added successfully.',
                'type'   => 'credit card',
            ),array(
                'name' => 'pending',
                'description'   => 'pending credit card is waiting for approval from an administrator.',
                'message'   => 'Your credit card is waiting for approval from an administrator. You will not be able to make payment until you receive this approval. You will be notified when your credit card is approved or denied.',
                'type'   => 'credit card',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked credit card have been temporarily suspended by an site administrator. The user\'s credit card and associated information are not deleted.  The user\'s can\'t pay using this credit card until an site administrator can reactivate the suspended card.',
                'message'   => 'Your credit card has been temporarily suspended by an administrator. You cannot pay using credit card but If your credit card is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'credit card',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted credit card have been removed from user account. User cannot pay using this credit card.',
                'message'   => 'Your credit card has been deleted from your account successfully.',
                'type'   => 'credit card',
            ),
            # Payment
            array(
                'name' => 'pending',
                'description'   => 'pending payment has been created and sent to the payment gateway and awaits a response. If the response is processed the following status can be Approved, Authorised, refused or error. While the payment has this status no new payment attempt can be carried out for this order. This status is not reported to the merchant.',
                'message'   => 'Your payment has been created and sent to the payment gateway and awaits a response.',
                'type'   => 'payment',
            ),array(
                'name' => 'declined',
                'description'   => 'declined payments have been declined by the payment gateway due to expired card, insufficient balance, security lock, or other problem with the credit card. No further action is required by site administrators.',
                'message'   => 'payment has been declined due to expired card, insufficient balance, security lock, or other problem with the credit card. Please re-submit with a different credit card or an alternate payment method.',
                'type'   => 'payment',
            ),
            array(
                'name' => 'error',
                'description'   => 'The payment was not completely processed by the payment gateway and / or the credit card network payment  due to unavailability of issuer, networks down, security lock, or other problem with the credit card. No further action is required by site administrators.',
                'message'   => 'Your payment has not been processed due to different reasons or problem with the credit card. Please re-submit with a different credit card or an alternate payment method.',
                'type'   => 'payment',
            )
            ,array(
                'name' => 'rejected',
                'description'   => 'rejected payments have been rejected by the payment gateway due to expired card, insufficient balance, security lock, or other problem with the credit card. No further action is required by site administrators.',
                'message'   => 'payment has been rejected due to expired card, insufficient balance, security lock, or other problem with the credit card. Please re-submit with a different credit card or an alternate payment method.',
                'type'   => 'payment',
            ),array(
                'name' => 'accepted',
                'description'   => 'accepted payment have been received by the payment gateway but has not yet been authorized. This is specific to credit card transactions.',
                'message'   => 'payment has been received by the payment gateway but has not yet been authorized.',
                'type'   => 'payment',
            ),array(
                'name' => 'approved',
                'description'   => 'approved payment have been received and validated by the payment gateway. The order amount has been reserved and deduct from the customer bank account. The amount has not yet been transferred.',
                'message'   => 'Your order amount payment has been received and reserved by the payment gateway but has not yet been transferred to merchant account.',
                'type'   => 'payment',
            ),
            array(
                'name' => 'redirected',
                'description'   => 'payment is received by the Bank but is routed, to the branch specified in the settlement account for special handling',
                'type'   => 'payment',
            ),array(
                'name' => 'successful',
                'description'   => 'successful payment have been processed and authorized by the payment gateway.',
                'message'   => 'Payment wad successfully c',
                'type'   => 'payment',
            ),array(
                'name' => 'authorised',
                'description'   => 'authorised payment have been processed and transferred to the merchant account by the payment gateway.',
                'message'   => 'Your order payment has been processed successfully.',
                'type'   => 'payment',
            ),array(
                'name' => 'failed',
                'description'   => 'failed payments have been rejected by the payment gateway due to expired card, insufficient balance, security lock, or other problem with the credit card. No further action is required by site administrators.',
                'message'   => 'Your order payment has been failed due to expired card, insufficient balance, security lock, or other problem with the credit card. Please re-submit with a different credit card or an alternate payment method.',
                'type'   => 'payment',
            ),array(
                'name' => 'cancelled',
                'description'   => 'The customer has canceled transaction. No further action is required by site administrators. Customer must complete the order again and resubmit it for payment.',
                'message'       => 'Your order payment has been cancelled successfully.',
                'type'          => 'payment',
            ), array(
                'name' => 'refunded',
                'description'   => 'refund payment have been processed by the payment gateway and has been transferred to customer\'s account. The amount will be deducted in the next purchase.',
                'message'   => 'Your refunded has been processed abd has been transferred to your wallet account. The amount will be deducted in the next purchase.',
                'type'   => 'payment',
            ), array(
                'name' => 'insufficient funds',
                'description'   => 'user doesn\'t have enough funds to complete purchase.',
                'message'   => 'Sorry, you have insufficient funds in your account to complete purchase. Please top up or re-submit with a different payment method.',
                'type'   => 'wallet',
            ), array(
                'name' => 'deposit',
                'description'   => 'user deposit amount into his wallet to complete purchase',
                'message'   => 'Your wallet has been top up successfully',
                'type'   => 'wallet',
            ), array(
                'name' => 'withdraw',
                'description'   => 'user deducts amount from his wallet to complete purchase',
                'message'   => 'Your purchase was successfully.',
                'type'   => 'wallet',
            ),

            # Order
            array(
                'name' => 'pending',
                'description'   => 'customer started the checkout process but did not complete it.',
                'type'   => 'order',
            ),array(
                'name' => 'payment',
                'description'   => 'customer has completed the checkout process, but payment has yet to be authorized.',
//                'message'   => 'Select your payment method to continue your purchase. You will be redirected to the',
                'message'   => 'Your order payment has been created and sent to the payment gateway and awaits a response',
                'type'   => 'order',
            ),array(
                'name' => 'fulfillment',
                'description'   => 'customer has completed the checkout process and payment has been reserved by payment gateway',
                'message'   => 'Your payment order amount has been reserved and deduct from the your bank account but has not yet been transferred to the merchant.',
                'type'   => 'payment',
            ),array(
                'name' => 'completed',
                'description'   => ' completed orders has been completed, and receipt has been sent to the customer email address is confirmed',
                'message'   => ' Your purchase has completed successfully and receipt has been sent to the customer email address.',
                'type'   => 'order',
            ),array(
                'name' => 'cancelled',
                'description'   => 'customer has cancelled the checkout process and order has been canceled due to other reasons',
                'message'   => 'Your order has been cancelled. We\'ve sent you an order cancellation email as follow up for any necessary refund.',
                'type'   => 'order',
            ),
            array(
                'name' => 'disputed',
                'description'   => 'customer has initiated a dispute resolution process for the transaction that paid for the order',
                'message'   => 'Your dispute has been sent successfully. A dispute resolution process for the transaction that paid for the order has been initiated.',
                'type'   => 'order',
            ), array(
                'name' => 'redeemed',
                'description'   => 'coupon code redeemed has already been redeemed. No further action is required by site administrators.',
                'message'   => 'Your coupon code has already been redeemed. Please re-submit with a different coupon code',
                'type'   => 'coupon',
            ),

            # General Server

            array(
                'name' => 'not found',
                'description'   =>'A user tried to access a web page or resource that doesn\'t exist. No further action is required by site administrators',
                'message'   => 'We can\'t seem to find the content you\'re looking for some reason. Please try again in a few minutes. We\'re sorry for the inconvenience',
                'type'   => 'http',
            ),

            array(
                'name' => 'bad request',
                'description'   => 'Something has gone wrong with the user web browser. The request was corrupted in some way, a further investigation is required by site administrators',
                'message'   => 'We\'re having trouble processing your request right now. Please try again in a few minutes. We\'re sorry for the inconvenience',
                'type'   => 'http',
            ),

            array(
                'name' => 'internal server error',
                'description'   => 'The server encountered an internal error or misconfiguration and was unable to processes the request. A further investigation is required by site administrators',
                'message'   => 'The server encountered an internal error or misconfiguration and was unable to complete your request. Please try again in a few minutes. We\'re sorry for the inconvenience.',
                'type'   => 'http',
            ),

            array(
                'name' => 'unauthorized',
                'description'   => 'A user tried to access a site that they don\'t have permissions to.  No further action is required by site administrators.',
                'message'   => 'It appears that you don\'t have sufficient rights to access this resource or page. Please make sure your\'re authorized to view this content. If you think you should be able to view this content, please notify site administrators of the problem.',
                'type'   => 'http',
            ),

            array(
                'name' => 'forbidden',
                'description'   => 'A user tried to access a page or content that has been forbidden.  No further action is required by site administrators.',
                'message'   => 'Sorry, the page or content you were trying to reach is absolutely forbidden for some reason. If you think you should be able to view this content, please notify site administrators of the problem.',
                'type'   => 'http',
            ),

            array(
                'name' => 'request timeout',
                'description'   => 'A user closed the browser, clicked on a link too soon, file is very large or stopped the request before the server finished retrieving information. The server could be running slow, a further investigation is required by site administrators',
                'message'   => 'We\'re having trouble processing your request right now. Please try again in a few minutes. We\'re sorry for the inconvenience',
                'type'   => 'http',
            ),

            array(
                'name' => 'not implemented',
                'description'   => 'A user has requested a feature that the browser does not support.  No further action is required by site administrators.',
                'message'   =>  'We\'re having trouble processing your request right now. The function requested is not supported. Please try again in a few minutes. We\'re sorry for the inconvenience',
                'type'   => 'http',
            ),

            array(
                'name' => 'connection refused',
                'description'   => 'A user either doesn\'t have permission to access the site, or an entered password is not correct. No further action is required by site administrators.',
                'message'   => 'It appears that you either do not have permission to access the site, or credential entered are not correct. If you think what you\'re authorized to view this content, please contact the site administrators.',
                'type'   => 'http',
            ),



            # supplier
            array(
                'name' => 'active',
                'description'   => 'active supplier have full access to all the purchases orders ',
                'message'   => 'Your supplier is active',
                'type'   => 'supplier',
            ),array(
                'name' => 'created',
                'description'   => 'created supplier have been added successfully to supplier list.',
                'message'   => 'Your supplier has been added successfully.',
                'type'   => 'supplier',
            ),array(
                'name' => 'pending',
                'description'   => 'pending supplier is waiting for approval from an administrator.',
                'message'   => 'Your supplier is waiting for approval from an administrator. You will not be able to make orders until you receive this approval. You will be notified when your supplier is approved or denied.',
                'type'   => 'supplier',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked supplier have been temporarily suspended by an site administrator. The prepaid supplier and associated information are not deleted.  The user\'s can\'t pay using this supplier until an site administrator can reactivate the suspended supplier.',
                'message'   => 'Your supplier has been temporarily suspended by an administrator. You cannot pay using supplier but If your supplier is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'supplier',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted supplier have been removed from supplier list. User cannot pay using this supplier.',
                'message'   => 'Your supplier has been deleted from your supplier list successfully.',
                'type'   => 'supplier',
            ),

            # utility or
            array(
                'name' => 'active',
                'description'   => 'active distributor have full access to all the purchases orders ',
                'message'   => 'Your distributor is active',
                'type'   => 'distributor',
            ),array(
                'name' => 'created',
                'description'   => 'created distributor have been added successfully to supplier list.',
                'message'   => 'Your distributor has been added successfully.',
                'type'   => 'distributor',
            ),array(
                'name' => 'pending',
                'description'   => 'pending distributor is waiting for approval from an administrator.',
                'message'   => 'Your distributor is waiting for approval from an administrator. You will not be able to make orders until you receive this approval. You will be notified when your supplier is approved or denied.',
                'type'   => 'distributor',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked distributor have been temporarily suspended by an site administrator. The distributor and associated information are not deleted.  The supplier\'s can\'t retiree supplier using this distributor until an site administrator can reactivate the suspended distributor.',
                'message'   => 'Your distributor has been temporarily suspended by an administrator. You cannot retiree suppliers using distributor but If your distributor is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'distributor',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted distributor have been removed from distributor list. Administrator cannot retrieve suppliers using this distributor.',
                'message'   => 'Your distributor has been deleted from your distributor list successfully.',
                'type'   => 'distributor',
            ),

            # order  type
            array(
                'name' => 'active',
                'description'   => 'active order type have full access to all the purchases ',
                'message'   => 'Your order type is active',
                'type'   => 'order',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked order type have been temporarily suspended by an site administrator. The order type and associated information are not deleted. User\'s can\'t purchase using this order type until an site administrator can reactivate the suspended order type.',
                'message'   => 'Your order type has been temporarily suspended by an administrator. You cannot purchase using this order type but If your order type is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'order',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted order type have been removed from order type list.',
                'message'   => 'Your order type has been deleted from your order type list successfully.',
                'type'   => 'order',
            ),

            # payment method
            array(
                'name' => 'active',
                'description'   => 'active payment method have full access to all the purchases payment ',
                'message'   => 'Your payment method is active',
                'type'   => 'payment',
            ),array(
                'name' => 'blocked',
                'description'   => 'blocked payment method have been temporarily suspended by an site administrator. The payment method and associated information are not deleted. User\'s can\'t pay using this payment method until an site administrator can reactivate the suspended payment method.',
                'message'   => 'Your payment method has been temporarily suspended by an administrator. You cannot pay using this payment method but If your payment method is suspended and you believe this to be in error, please contact your site administrator.',
                'type'   => 'payment',
            ),array(
                'name' => 'deleted',
                'description'   => 'deleted payment method have been removed from payment method list.',
                'message'   => 'Your payment method has been deleted from your order type list successfully.',
                'type'   => 'payment',
            ),








            #
//                'active', 'deactivated','locked','blocked','not verified')
        ];

        foreach ($users_status as $status){
            Status::create($status);
        }
    }
}
