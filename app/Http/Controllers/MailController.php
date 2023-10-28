<?php

namespace App\Http\Controllers;
use App\Http\Controllers\talentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;
use App\Models\HireTalent;
use App\Models\talent;
use App\Mail\DemoMail;
use App\Mail\UserFeedbackMail;

class MailController extends Controller
{

    public function index()
    {
        $userEmail = 'prasaddeshpande201@gmail.com';

        // Retrieve details from the database
        $hireTalentDetails = DB::table('tickets')
                    ->leftJoin('hire_talent', 'tickets.hiretalentID', '=', 'hire_talent.id')
                    ->select('tickets.id', 'ticket_description', 'hire_talent.full_name AS emp_name')
                    ->orderBy('tickets.id', 'desc') // Specify the table name or alias for 'id' column in orderBy
                    //->where('tickets.hire_talentID', '=', $yourHireTalentId) // Replace $yourHireTalentId with the actual ID you want to retrieve details for
                    ->first();

        if ($hireTalentDetails) {
            $mailData = [
                'title' => 'Hi',
                'body' => 'How are you!!',
                'emp_name' => $hireTalentDetails->emp_name,
                'ticket_description' => $hireTalentDetails->ticket_description,
            ];

            Mail::to($userEmail)->send(new DemoMail($mailData));
            // dd('Email Sent Successfully');
            return redirect(url('/HireTalent'))->with('success', 'Ticket successfully raise !!!');
        } else {
            dd('No matching record found'); // Handle the case where no matching record is found
        }
    }

   
      }

