/**
 * 
 */

$('.btn-update').click(function () {
  
  var $this = $(this);

  // Input
  var input = prompt("Please enter the Title name", "Title");
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
      console.log($this.parent())
      $this.parent().sblings('.field-title').text(title);
  });
});