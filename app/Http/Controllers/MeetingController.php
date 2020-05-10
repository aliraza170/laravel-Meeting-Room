<?php

namespace App\Http\Controllers;

use Abiodunjames\Bigbluebutton\Contracts\Meeting;
use BigBlueButton\Parameters\CreateMeetingParameters;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * @var \Abiodunjames\Bigbluebutton\Contracts\Meeting
     */
    protected $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

        /**
         * Create a bigbluebutton meeting
         *
         * @param \Illuminate\Http\Request $request
         * @return void
         */
        public function create(Request $request)
        {
            $meetingParams = new CreateMeetingParameters($request->meetingId, $request->meetingName);
            $meetingParams->setDuration(40);
            $meetingParams->setModeratorPassword('supersecretpwd');
    
            if ($this->meeting->create($meetingParams)) {
                // Meeting was created
				echo "created";
            }
        }
}
