<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A PHP ChatBOT">
  <meta name="keywords" content="HTML,CSS,JS,jQuery,PHP">
  <meta name="author" content="Teena Joseph">
  <title>ChatBOT-Home</title>
  <!-- App CSS -->
  <link rel="stylesheet" href="./styles/styling.css" type="text/css" />
</head>
<body>
<form id="sendform" method="post">

<div id="bot">
  <div id="container">
    <div id="header">
      Welcome to  Chatbot 
    </div>
    <div id="body">
      <div id="output">
        <p>Hello there, how can I help you?</p>
       </div>
       <div class="seperator"></div>
    </div>
    <div id="inputArea">
        <input type="text" name="messages" id="userInput" placeholder="Please enter your message here" required>
        <input type="submit"  id="send" value="Send">
    </div>
  </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  function showtime(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var formattime = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + formattime;
  return strTime;
}
// submit form data using ajax
  $('#sendform').on('submit', function(event) {
    event.preventDefault();
    var input = $('#userInput').val();
    var showtimeval = showtime(new Date);
    $('#output').append('<div class="seperator"></div><div class="user-message">' + input+'&nbsp&nbsp'+showtimeval+'&nbsp' +'</div>');

    $.ajax({
      url: 'firstpage.php',
      type: 'post',
      data: { messageValue : input },
      success: function(response) {
        var showtime_resp = showtime(new Date);
        $('#output').append(' <div class="seperator"></div><div class="bot-reply">' + response +'&nbsp&nbsp'+showtime_resp+'&nbsp'+'</div>');
      }
    });
    // clear input field
    $('#userInput').val('');
  });
})
</script>
</body>
</html>
