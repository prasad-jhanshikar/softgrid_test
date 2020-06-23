<?php
if (!function_exists('isPending')) {
    /**
     * @param $userId
     * @return bool
     */
    function isPending($userId)
    {
        $pendingRequestsBy = auth()->user()->pendingRequestsBy->pluck('send_to')->all();
        $pendingRequestsTo = auth()->user()->pendingRequestsTo->pluck('send_by')->all();

        if(in_array($userId, $pendingRequestsBy) || in_array($userId, $pendingRequestsTo)) {
            return true;
        }
        return false;
    }
}


if (!function_exists('isFriend')) {
    /**
     * @param $userId
     * @return bool
     */
    function isFriend($userId)
    {
        $acceptedRequestsBy = auth()->user()->acceptedRequestsBy->pluck('send_to')->all();
        $acceptedRequestsTo = auth()->user()->acceptedRequestsTo->pluck('send_by')->all();

        if(in_array($userId, $acceptedRequestsBy) || in_array($userId, $acceptedRequestsTo)) {
            return true;
        }
        return false;
    }
}


if (!function_exists('isRejected')) {
    /**
     * @param $userId
     * @return bool
     */
    function isRejected($userId)
    {
        $rejectedRequestsBy = auth()->user()->rejectedRequestsBy->pluck('send_to')->all();
        $rejectedRequestsTo = auth()->user()->rejectedRequestsTo->pluck('send_by')->all();

        if(in_array($userId, $rejectedRequestsBy) || in_array($userId, $rejectedRequestsTo)) {
            return true;
        }
        return false;
    }
}

