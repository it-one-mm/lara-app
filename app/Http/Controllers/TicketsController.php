<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {
        $ticket = $request->all();
        $ticket['slug'] = Str::slug($ticket['title']);

        Ticket::create($ticket);

        $data = array(
            'ticket' => $ticket['slug'],
        );
        Mail::send('emails.ticket', $data, function ($message) {
            $message->from('naingwinhtet49@gmail.com', 'IT ONE');
            $message->to('naingwinhtet49@gmail.com')->subject('There is a new ticket!');
        });

        return redirect( url('contact') )->with('status', 'Your Ticket has been submitted!');
    }
}
