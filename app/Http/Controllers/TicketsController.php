<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('tickets.index', compact('tickets'));
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $comments = $ticket->comments()->get();

        return view('tickets.show', compact('ticket', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTicket $request, $slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $ticket->title = $request->title;
        $ticket->content = $request->content;
        if($request->status != null) { // Opened
            $ticket->status = 0;
        } else { // Closed
            $ticket->status = 1;
        }
        $ticket->save();

        return redirect(action('TicketsController@edit', $slug))->with('status', "Ticket '{$slug}' has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $ticket->delete();

        return redirect(action('TicketsController@index'))->with('status', "Ticket '{$slug}' has been deleted!");
    }
}
