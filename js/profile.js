$(document).ready(function() {
    // при клике на вкладку
    $('.tab').on('click', function() {
      // скрываем активное содержимое и делаем неактивной вкладку
      $('.tab.active').removeClass('active');
      $('.tab-content.active').removeClass('active');
  
      // получаем идентификатор целевой вкладки
      var tabId = $(this).attr('data-tab');
  
      // показываем содержимое целевой вкладки и делаем активной вкладку
      $('[data-tab="' + tabId + '"]').addClass('active');
      $(this).addClass('active');
    });
  });
  