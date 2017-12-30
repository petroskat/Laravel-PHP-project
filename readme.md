This is a PHP Laravel Blog/Advertisement project implemented with full CRUD capabilities. The user can register a new account. Log in and then add , edit and delete his own advertisements/posts. Guests can only browse the advertisements index and visit any advertisement.

Every adv.. consists of a title , a general description and an image from which the title and the description ar searchable from the home page. In order to achieve that a simple search engine was implemented if the guest/user doesnt want to browser the ads and wants a quick results of the ad he is looking for. The image that is uploaded during the advertisement creation is stored and opens with a modal in the show view.

Databasewise 2 models were created. User and Adv for obvious reasons and operations. User has a hasmany relationship with Advs and Adv has a foreign key ( user_id ) .

For the frontend i mostly used bootstrap and made the webapp mobile/friendly - responsive as good as possible without giving a lot of time and much testing though. 

As far as concerns the advertisement description textArea i used the TinyMCE free edition , one of the most advanced WYSWIYG HTML editors out there.

Feel free to browse the code and contact me for any questions or comments.
