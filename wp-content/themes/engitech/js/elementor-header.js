(function($) {
    "use strict";

    /* --------------------------------------------------
    * sticky header
    * --------------------------------------------------*/
    $('.header-static .is-fixed').parent().append('<div class="header-clone"></div>');
    $('.header-clone').height($('#site-header .is-fixed').outerHeight());
    $('.header-static .header-clone').hide(); 
    $(window).on("scroll", function(){
      var site_header = $('#site-header').outerHeight() + 1;  
        
      if ($(window).scrollTop() >= site_header) {       
        $('.site-header .is-fixed').addClass('is-stuck'); 
        $('.header-static .header-clone').show(); 
      }else {
        $('.site-header .is-fixed').removeClass('is-stuck');                  
        $('.header-static .header-clone').hide();
      }
    });
  
    /* --------------------------------------------------
    * side panel
    * --------------------------------------------------*/
      var element = $('#panel-btn'),
      sidebar = $('#side-panel');
  
      function panel_handler() {
          var isActive = !element.hasClass('active');
  
          element.toggleClass('active', isActive);
          sidebar.toggleClass('side-panel-open', isActive);
          $('body').toggleClass('side-panel-active', isActive);
          return false;
      }
  
      $('#panel-btn, .side-panel-close, .panel-overlay').on('click', panel_handler);
  
    /* --------------------------------------------------
    * toggle search
    * --------------------------------------------------*/
    var tgSearch  = function($scope, $){
      $scope.find('.octf-search').each( function(){
        var selector = $(this);
        selector.find('.toggle-search').on("click", function(){
          $(this).toggleClass( "active" );
          selector.find('.h-search-form-field').toggleClass('show');
          if ($(this).find('i').hasClass( "flaticon-search" )) {
            $('.toggle-search > i').removeClass( "flaticon-search" ).addClass("flaticon-close");
          }else{
            $('.toggle-search > i').removeClass( "flaticon-close" ).addClass("flaticon-search");
          }
        });
      });
    };
  
    /* --------------------------------------------------
    * mobile menu
    * --------------------------------------------------*/
    var mmenuPanel  = function(){
          var element = $('#mmenu-toggle'),
              mmenu   = $('#mmenu-wrapper');
  
          function mmenu_handler() {
              var isActive = !element.hasClass('active');
  
              element.toggleClass('active', isActive);
              mmenu.toggleClass('mmenu-open', isActive);
              $('body').toggleClass('mmenu-active', isActive);
              return false;
          }
  
          $('#mmenu-toggle, .mmenu-close, .mmenu-overlay').on('click', mmenu_handler);
  
          $('.mmenu-wrapper li:has(ul)').prepend('<span class="arrow"><i class="flaticon-right-arrow"></i></span>');
          $(".mmenu-wrapper .mobile_mainmenu > li span.arrow").on('click',function() {
              $(this).parent().find("> ul").stop(true, true).slideToggle()
              $(this).toggleClass( "active" ); 
          });
      };
  
      /**
       * Elementor JS Hooks
       */
      $(window).on("elementor/frontend/init", function () {
  
          /*toggle search*/
          elementorFrontend.hooks.addAction(
              "frontend/element_ready/isearch.default",
              tgSearch
          );
  
          /*mmenu*/
          elementorFrontend.hooks.addAction(
              "frontend/element_ready/imenu_mobile.default",
              mmenuPanel
          );
  
    });
  
  })(jQuery);