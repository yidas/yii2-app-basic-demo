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
    data: {'title': input}
  }).done(function (data) {
      var title = data.title;
      $title.text(title);
  });
});
