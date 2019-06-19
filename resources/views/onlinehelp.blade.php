@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <h3 class="text-center">Online Help</h3>
    <div class="accordion" id="accordionExample">

        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#account" aria-expanded="true" aria-controls="collapseOne">
                Creating an Account
              </button>
            </h2>
          </div>

          <div id="account" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <ol>
                    <li>Enter a username.</li>
                    <li>Enter a valid email address.</li>
                    <li>Enter password</li>
                    <li>Click Register.</li>
                </ol>
            </div>
          </div>

        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#createpost" aria-expanded="true" aria-controls="collapseOne">
                       Creating a Post
                </button>
                </h2>
            </div>

            <div id="createpost" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Visit the posts page by clicking the home / dashboard</li>
                        <li>Place your cursor inside the text area with &lsquo;create post&rsquo; label</li>
                        <li>Start typing your desired post</li>
                        <li>Choose the category you desire. By default, all posts are opinions. If you wish to choose something else different, choose your option by clicking the category of choice.</li>
                        <li>If you wish to add an image, click on the &lsquo;image gallery &lsquo; icon on your left and choose an image of choice. You can upload up-to 4 images</li>
                        <li>Click post and your post will be automatically sent</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#createcomment" aria-expanded="true" aria-controls="collapseOne">
                       Creating a Comment
                </button>
                </h2>
            </div>

            <div id="createcomment" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click comment button on the post you wish to comment on.</li>
                        <li>Place your cursor inside the text area with &lsquo;comment&rsquo; label</li>
                        <li>Start typing your desired comment</li>
                        <li>If you wish to add an image, click on the &lsquo;image gallery &lsquo; icon on your left and choose an image of choice. You can upload up-to 4 images.</li>
                        <li>Click comment and your comment will be saved</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#likes" aria-expanded="true" aria-controls="collapseOne">
                        Liking and un-liking a Post/Comment
                </button>
                </h2>
            </div>

            <div id="likes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click Like button on the post/comment you want to add like.</li>
                        <li>The likes are automatically incremented and the &lsquo;favorite&rsquo; icon turns reddish.</li>
                        <li>If you click it again, it removes the like and turns grayish</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#createevent" aria-expanded="true" aria-controls="collapseOne">
                        Creating an Event
                </button>
                </h2>
            </div>

            <div id="createevent" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Visit the Events page by clicking the Events from the navigation menu if you&rsquo;re an admin</li>
                        <li>A &lsquo;create event&rsquo; green button appears on the left side of the page beside the side menu.</li>
                        <li>Click this button and you will be redirected to create new event page</li>
                        <li>Fill in the desired fields i.e. the Event Name, Start date and end date, location, some description of the events and Guests in the event if any.</li>
                        <li>Be careful to fill the details carefully e.g. You cannot create an Event at the same location and time if already another one exists.</li>
                        <li>Click &lsquo;create&rsquo; button at the bottom and your event will successfully be created.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#editevent" aria-expanded="true" aria-controls="collapseOne">
                        Editing an event
                </button>
                </h2>
            </div>

            <div id="editevent" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click the event you wish to edit for the list of events</li>
                        <li>Click the &lsquo;edit&rsquo; green button at the bottom of the page</li>
                        <li>Change the fields to the desired values</li>
                        <li>Click &lsquo;update&rsquo; button at the bottom and your new event details will successfully be saved.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#deleteevent" aria-expanded="true" aria-controls="collapseOne">
                        Deleting an event
                </button>
                </h2>
            </div>

            <div id="deleteevent" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click the event you wish to delete for the list of events</li>
                        <li>Click the &lsquo;delete&rsquo; reddish button at the bottom of the page</li>
                        <li>A confirmation dialog pops up</li>
                        <li>Confirm deletion by clicking the delete button and your event will be deleted.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#viewevents" aria-expanded="true" aria-controls="collapseOne">
                        Viewing Events
                </button>
                </h2>
            </div>

            <div id="viewevents" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Visit the Events page by clicking &lsquo;Events&rsquo; at the navigation menu.</li>
                        <li>Scroll to view the events from the list</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#postnews" aria-expanded="true" aria-controls="collapseOne">
                        Posting News
                </button>
                </h2>
            </div>

            <div id="postnews" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Visit the News page by clicking the New menu item from the navigation menu if you&rsquo;re an admin</li>
                        <li>A &lsquo;ADD NEW&rsquo; green button appears on the left side of the page beside the side menu.</li>
                        <li>Click this button and you will be redirected to create post news page</li>
                        <li>Fill in the desired fields i.e. Title, description and add an optional photo if any.</li>
                        <li>Click &lsquo;publish&rsquo; button at the bottom and your event will successfully be created.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#editnews" aria-expanded="true" aria-controls="collapseOne">
                        Editing News Item
                </button>
                </h2>
            </div>

            <div id="editnews" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click the news item you wish to edit for the list of news items in the news page</li>
                        <li>Click the &lsquo;edit&rsquo; green button at the bottom of the page</li>
                        <li>Change the fields to the desired values</li>
                        <li>Click &lsquo;update&rsquo; button at the bottom and your updated changes will successfully be saved.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#deletenews" aria-expanded="true" aria-controls="collapseOne">
                        Deleting news item
                </button>
                </h2>
            </div>

            <div id="deletenews" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Click the news item you wish to edit for the list of news items in the news page</li>
                        <li>Click the &lsquo;delete&rsquo; reddish button at the bottom of the page</li>
                        <li>A confirmation dialog pops up</li>
                        <li>Confirm deletion by clicking the delete button and your news item will be deleted.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#viewnews" aria-expanded="true" aria-controls="collapseOne">
                        Viewing news
                </button>
                </h2>
            </div>

            <div id="viewnews" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                        <li>Visit the News page by clicking &lsquo;Events&rsquo; from the navigation menu.</li>
                        <li>Scroll through to view the news from the list</li>
                        <li>Click the Read More button to read the whole story if it interests you.</li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#createpoll" aria-expanded="true" aria-controls="collapseOne">
                        Creating a poll
                </button>
                </h2>
            </div>

            <div id="createpoll" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ol>
                            <li>Visit the Polls page by clicking the Poll from the side navigation menu if you&rsquo;re an admin</li>
                            <li>Click &lsquo;Create a Poll&rsquo; green button at the top of the page.</li>
                            <li>Type the question of interest you would like to conduct polls about.</li>
                            <li>Add the choices as indicated in the form. The choices must at-least be two.</li>
                            <li>If you wish to add more choices, click the &lsquo;Add more Choices&rsquo; blue link, an empty input field will automatically be inserted for you.</li>
                            <li>Choose the poll length. It should be at-least one day.</li>
                            <li>Click &lsquo;create&rsquo; button at the bottom and your Poll will be created</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#votepoll" aria-expanded="true" aria-controls="collapseOne">
                        Voting for a poll
                </button>
                </h2>
            </div>

            <div id="votepoll" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                        <ol>
                                <li>Visit the Polls page by clicking the Poll from navigation menu.</li>
                                <li>Choice from the list the poll you would like to vote on. The polling period must be active for that particular poll.</li>
                                <li>Carefully read the question and click the choice of your opinion.</li>
                                <li>Your vote is automatically recorded and results displayed on spot.</li>
                                </ol>
                                <p>NB: if you have voted for a poll previously, you can only view the results.</p>
                                <p>&nbsp;</p>
                        </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pollresults" aria-expanded="true" aria-controls="collapseOne">
                        Viewing results
                </button>
                </h2>
            </div>

            <div id="pollresults" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                        <ol>
                                <li>Visit the Polls page by clicking the Poll from the navigation menu.</li>
                                <li>You will automatically view the results of each and every poll in the list of the results are available.</li>
                        </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#servicerequest" aria-expanded="true" aria-controls="collapseOne">
                        Requesting for a service
                </button>
                </h2>
            </div>

            <div id="servicerequest" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                        <ol>
                            <li>Visit the Services page by clicking Services menu item from the navigation menu.</li>
                            <li>Click &lsquo;request for service&rsquo; button at the top of the page</li>
                            <li>Choose the Type of request from the options list</li>
                            <li>Explain why you are requesting for the service in the description input field.</li>
                            <li>Add your phone number for follow-up call by the county officials and your current location.</li>
                            <li>Choose an image that gives more information e.g. incase of fire. Remember a photo is worth a thousand word.</li>
                            <li>Click &lsquo;Send&rsquo; button and your request is automatically made.</li>
                        </ol>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#viewserivices" aria-expanded="true" aria-controls="collapseOne">
                        Viewing service requests
                </button>
                </h2>
            </div>

            <div id="viewserivices" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                        <ol>
                            <li>Visit the Services page by clicking Services menu item from the navigation menu.</li>
                            <li>You will automatically view the all the service requests you have previous made.</li>
                        </ol>
                </div>
            </div>
        </div>




    </div>

</div>

@endsection
