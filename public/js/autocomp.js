$(function() {
    var availableTags = [
        { value : 'Olivier', desc : 'Juste trop beau en fait'},
        "Hadrien",
        "Lloyd",
        "Bastien"

    ];
    $("#tags").autocomplete({
        source: availableTags,
        minLength : 2,
        select : function(event, ui){
            $('#description').val( ui.item.desc ); // on ajoute la description de l'objet dans un bloc
        }
    });
});
