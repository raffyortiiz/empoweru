(function($) {
    $('#e_preference').parent().append('<ul class="list-item" id="newe_preference" name="e_preference"></ul>');
  $('#e_preference option').each(function(){
      $('#newe_preference').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
  });
  $('#e_preference').remove();
  $('#newe_preference').attr('id', 'e_preference');
  $('#e_preference li').first().addClass('init');
  $("#e_preference").on("click", ".init", function() {
      $(this).closest("#e_preference").children('li:not(.init)').toggle();
  });
  
  var all_Options = $("#e_preference").children('li:not(.init)');
  $("#e_preference").on("click", "li:not(.init)", function() {
      all_Options.removeClass('selected');
      $(this).addClass('selected');
      $("#e_preference").children('.init').html($(this).html());
      all_Options.toggle();
  });






})(jQuery);