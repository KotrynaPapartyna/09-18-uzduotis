
// jquery
// reikia pasirasyti koda, kuris fiksuoja ar puslapis yra uzsikroves
// kitaip kodas neveiks 

    // reikia pasirinkti elementus 
    
$(function() {
    // galima sutasyti ir vienoje eiluteje jeigu taikoma tam paciam 
    $(".alert").fadeIn(1000).delay(2000).fadeOut(2000); 

    //$(".alert").fadeIn(500); 
    //$(".alert").delay(2000); 
    //$(".alert").fadeOut(300);

    $(document).ready(function() {
        $('#turinys').summernote();
        $('#santrauka').summernote();
      });
}); 

// bilbiotekoje yra suprogramuota kaip funkcijos/ efektai : 
        // fadeIn()- atsirask . (nurodomas laikas- per kiek laiko)
        // fadeOut()- isnyk. (nurodomas laikas- per kiek laiko)
        // delay() - uzdelsimas. (nurodomas laikas- per kiek laiko)
        //(laikas yra nurodomas ms- likisekundemis) 