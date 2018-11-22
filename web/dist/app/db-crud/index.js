/**
 * 
 */

$('.btn-update').click(function () {
  
  var $this = $(this);
  var $title = $this.parent().siblings('.field-title');
  var defaultTitle = $title.text() || 'Title';

  // Input
  var input = prompt("Please enter the Title name", defaultTitle);
  if (input === null) {

      return false;
  }

  // RESTful API
  $.ajax({
    type: "PUT",
    url: $this.attr('data-url'),
    data: {'title': input},
    statusCode: {
      200: function (res) {
        var title = res.title;
        $title.text(title);
      },
      400: function (res) {
        var message = '';
        $.each(res.responseJSON.errors, function (index, value) {
          console.log(value)
          message += value[0];
        });
        alert(message);
      },
    }
  }).done(function (data) {
    // Do nothing
  })
});
