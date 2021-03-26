<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;

Trait Statistics{

    public function getActiveTotal(Collection $collection){
        return $collection->where('active','1')->count();
    }

    public function getTotal(Collection $collection){
        return $collection->count();
    }

    public function getBlockedTotal(Collection $collection){
        return $collection->where('active','0')->count();
    }

    public function getUnverifiedTotal(Collection $collection){
        return $collection->where('active','0')->count();
    }

    public function getDeletedTotal(Collection $collection){
        return $collection->where('status','deleted')->count();
    }

    public function getTrashTotal(Collection $trash)
    {
        return $trash->count();
    }

    public function getActiveBooleanTotal(Collection $collection) {
        return $collection->where('active', 1)->count();
    }

    public function getNewBuyersTotal(Collection $collection){

    }

    public function getReturnBuyersTotal(Collection $collection){

    }

    public function getToday()
    {
        $today = Carbon::now()->toDateString();
        $midnight = $today.' '.Carbon::now()->startOfDay()->toTimeString();
        $endOfDay = $today.' '. Carbon::now()->endOfDay()->toTimeString();
        return array($midnight,$endOfDay);
    }

    public function getMonth()
    {
        $from = Carbon::now()->startOfMonth()->toDateString().' '.Carbon::now()->startOfDay()->toTimeString();
        $to =  Carbon::now()->toDateString().' '. Carbon::now()->endOfDay()->toTimeString();
        return  array($from,$to);
    }

    public function getYear()
    {
        $from = Carbon::now()->startOfYear()->toDateString().' '.Carbon::now()->startOfDay()->toTimeString();
        $to =  Carbon::now()->toDateString().' '. Carbon::now()->endOfDay()->toTimeString();
        return array($from,$to);
    }

    public function getDateRange($from, $to)
    {
        $from = Carbon::createFromTimeString($from);
        $to = Carbon::createFromTimeString($to);
        return  array($from,$to);
    }

    public function months($date){
        $from = Carbon::createFromTimeString($date)->startOfMonth()->toDateString() .' '.Carbon::now()->startOfDay()->toTimeString();
        $to = Carbon::createFromTimeString($date)->endOfMonth()->toDateString() .' '.Carbon::now()->endOfDay()->toTimeString();
        return array($from,$to);
    }

    public function getMonthlyReport($collection, $from = 10){

        $results= [];
        for ($i= 1; $i <= 6 ; $i++ ){
            $results['2019-'.$i.'-01'] = money_format('%.2n', $collection->whereBetween('created_at', self::months('2019-'.$i.'-01' .' 00:00:00'))->sum('total'));
        }

        return $results;

    }


    public function getTodayRegistrations(Collection $collection)
    {
        return $collection->whereBetween('created_at', self::getToday());
    }

    public function getMonthRegistrations(Collection $collection)
    {
        return $collection->whereBetween('created_at', self::getMonth());
    }

    public function getYearRegistrations(Collection $collection)
    {
        return $collection->whereBetween('created_at', self::getYear());
    }

    public function getDateRangeRegistrations(Collection $collection, $from,$to)
    {
        return $collection->whereBetween('created_at', self::getDateRange($from,$to));
    }

}
