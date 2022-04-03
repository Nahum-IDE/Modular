$('#registrarme').on("click", function(){
    $('#c1').addClass('move');
    $("#c2").removeClass("move2");
    });
  
    $("#iniciar").on("click", function () {
      $("#c1").removeClass("move");
      $("#c2").addClass("move2");
    });
    
    $('.menu-btn').on('click', function(){
        $(this).toggleClass('close-btn')
      $('aside').toggleClass('show-aside')
    })
    
    $('.open-filter').on('click', function(){
        $(this).addClass('active-btn')
      $('.filter-container').toggleClass('show-filter-container')
    })
    
    $("body").on("click", function () {
        $('.filter-container').removeClass("show-filter-container");
      $('.open-filter').removeClass('active-btn')
    });
    
    $('.filter-container , .open-filter').on("click", function (e) {
        e.stopPropagation();
    });
    
    $('#all-rows input').on('click', function(){
      if($(this).prop("checked") == true){
        $('table input[type="checkbox"]').prop("checked", true);
        $('.table-action').removeClass('d-none')
      }
      else if($(this).prop("checked") == false){
        $('table input[type="checkbox"]').prop("checked", false);
        $('.table-action').addClass('d-none')
      }
    })
   
    $('.profile-option').on('click', function(){
      $('.menu').toggleClass('show-menu')
    })
    
    // modal function
    $('.modal-btn').on("click", function(){
      var modal = $(this).attr('data-buttonmodal');
      $('[data-modal="'+ modal + '"]').addClass('show-modal')
    });
    
    $('.close-modal').on('click', function(){
      $(this).parent().parent().parent().parent().removeClass('show-modal')
    })

      //Funcion que hace desaparecer el div transcurridos
      $(document).ready(function() {
        $("#oculta").fadeOut(6000);
      });
    