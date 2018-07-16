$('.btn-search').click(function(){
  $('.searchbar').toggleClass('clicked');


  if($('.searchbar').hasClass('clicked')){
    $('.btn-extended').focus();
  }

});
