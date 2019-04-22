
  window.fcWidget.init({
    token: "51fb3c00-afb4-47f9-9a02-3e587f6cd0ff",
    host: "https://wchat.freshchat.com",

restoreId: restoreId ? restoreId : null,

    config: {
      disableEvents: true,
      cssNames: {
        widget: 'fc_frame',
        open: 'fc_open',
        expanded: 'fc_expanded'
      },
      agent: {
        hideName: false,
        hidePic: true,
        hideBio: false,
      },
      headerProperty: {
          //If you have multiple sites you can use the appName and appLogo to overwrite the values.
        //appName: 'Wallet.NG',
        //appLogo: 'https://d1qb2nb5cznatu.cloudfront.net/startups/i/2473-2c38490d8e4c91660d86ff54ba5391ea-medium_jpg.jpg?buster=1518574527',
        backgroundColor: '#5C2799',
        //foregroundColor: '#333333',
        //backgroundImage: 'https://wchat.freshchat.com/assets/images/texture_background_1-bdc7191884a15871ed640bcb0635e7e7.png'
      },
      content: {
        placeholders: {
          search_field: 'Search',
          reply_field: 'Reply',
          csat_reply: 'Add your comments here'
        },
        actions: {
          csat_yes: 'Yes',
          csat_no: 'No',
          push_notify_yes: 'Yes',
          push_notify_no: 'No',
          tab_faq: 'Solutions',
          tab_chat: 'Chat',
          csat_submit: 'Submit'
        },
    headers: {
      chat: 'Chat with Us',
      chat_help: 'Reach out to us if you have any questions',
      push_notification: 'Don\'t miss out on any replies! Allow push notifications?',
      csat_question: 'Did we address your concerns??',
      csat_yes_question: 'How would you rate this interaction?',
      csat_no_question: 'How could we have helped better?',
      csat_thankyou: 'Thanks for the response',
      csat_rate_here: 'Submit your rating here',
      channel_response: {
        // offline: 'We are currently away. Please leave us a message',
        online: {
          minutes: {
            one: "Currently replying in {!time!} minutes ",
            more: "Typically replies in {!time!} minutes"
          },
          hours: {
            one: "Currently replying in under an hour",
            more: "Typically replies in {!time!} hours",
          }
        }
      }
    }
      }
    }
  });

  
window.fcWidget.user.get(function(resp) {
var status = resp && resp.status,
  data = resp && resp.data;
if (status !== 200) {
window.fcWidget.user.setProperties({
  externalId: externalId,     // user’s id unique to your system
  firstName: firstName,              // user's first name
  lastName: lastName,                // user's last name
  email: email,    // user's email address
  phone: phone            // phone number without country code
});
window.fcWidget.on('user:created', function(resp) {
  var status = resp && resp.status,
      data = resp && resp.data;
  if (status === 200) {
    if (data.restoreId) {
      // Update restoreId in your database
    }
  }
});
}
});