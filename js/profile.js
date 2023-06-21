src="https://code.jquery.com/jquery-3.6.0.min.js"
$(document).ready(function() {
  $('.tab').on('click', function() {
    $('.tab.active').removeClass('active');
    $('.tab-content.active').removeClass('active');
    var tabId = $(this).attr('data-tab');

    $('[data-tab="' + tabId + '"]').addClass('active');
    $(this).addClass('active');
  });
});

function openTab(tabId) {
  $('.tab.active').removeClass('active');
  $('.tab-content.active').removeClass('active');

  $('[data-tab="' + tabId + '"]').addClass('active');
  $('[data-tab="' + tabId + '"]').addClass('active');
}