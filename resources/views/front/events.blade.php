@extends('layouts.front')
@section('title', 'Events')

@section('content')
<div class="container">
  <div class="section">
    <div class="row">
      <h1 class="header center grey-text text-darken-3">Events</h1>
      <iframe src="https://orgsync.com/86744/calendar/iframe" style="border: 0; height: 710px; width: 100%"></iframe>
    </div>
  </div>
</div>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card hoverable">
          <div class="card-content">
            <span class="card-title black-text">Subscribe to our Calendar!</span>
            <p>You can now subscribe to the ACM events calendar! Or, if you'd prefer you can bundle all of your OrgSync groups into one calendar. Visit the links below and click the subscribe button in the top right corner to get started.</p>
            <a href="https://orgsync.com/86744/events?view=upcoming" target="_blank">ACM Calendar</a>
            <br />
            <a href="https://orgsync.com/calendar?view=calendar" target="_blank">View your OrgSync calendar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12">
        <div class="card hoverable">
          <div class="card-content">
            <span class="card-title black-text">Regular Events</span>
            <ul class="eventList">
              <li>ACM Help Sessions<br />
                The ACM hosts help sessions every Tuesday night for computer, math, and science courses in DUE 1116 from 7-9pm.
              </li>
              <li>Tech Talks<br />
                Throughout the year, ACM will host tech talks where company representatives will stop by and give an information session with details about the company and any upcoming internships and full/part time positions they may have. This is a great way to meet people and get prepared for the career fair!
              </li>
              <li>Programming Competitions<br />
                Every semester there is a programming competition open to all K-State students. In the past we've had over $3,000 in prizes and winners get to advance to the regional programming contest (and possibly national!).
              </li>
              <li>LAN Parties<br />
                Usually about twice per semester ACM will host a LAN party where you can bring your PC or console to the engineering and play some games with your friends! LAN parties usually start at 7pm and go until sunrise. There are no specific games or official tournaments, so bring your favorite game along with some headphones!
              </li>
              <li>Hour of Code<br />
                The 'Hour of Code' is a nationwide initiative by Computer Science Education Week and Code.org to introduce millions of students to computer science and computer programming. You can find more information online at <a href="http://hourofcode.com" target="_blank">http://hourofcode.com</a>. This event is open to youth of all ages! During the event, K-State faculty and students will lead youth in hour-long age-appropriate Computing Science and Programming activities based in a visual programming language called Scratch.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
