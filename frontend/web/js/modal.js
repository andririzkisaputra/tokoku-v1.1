$(function(){
  $(document).on('click', '.showModalButton', function() {
  // $(".showModalButton").click(function(){
    $("#modal").modal('show')
    .find("#modalContent")
    .load($(this).attr('value'));
  });
});
