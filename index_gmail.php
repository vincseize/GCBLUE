<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
<!--     <meta name="1049310437411-debevsgeh2vjebvfo6fvln8n9a24979t.apps.googleusercontent.com"> -->
<!--     <meta name="1049310437411-ip83q4s72rvokugtijqtbm776qvjnbrs.apps.googleusercontent.com">  -->   
    <meta name="google-signin-client_id" content="1049310437411-ip83q4s72rvokugtijqtbm776qvjnbrs.apps.googleusercontent.com">
    
<!-- secret
    eBnnUHhCyrr9TKoh8g8cyukN -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  

    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
      }nsole.log("ID Token: " + id_token);
            };
    </script>









  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>







  </body>
</html>