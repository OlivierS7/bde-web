$(document).ready(function() {
    $.ajax({
        method: 'GET',
        url: "http://localhost:8000/productList",
        success: function(response) {
            var options = {
                data: response,
                getValue: "name",
                template: {
                    type: "links",
                    fields: {
                        link: "url"
                    }
                },
                list: {
                    match: {
                        enabled: true,
                    }
                },
                theme: "square"
            };
            $("#recherche").easyAutocomplete(options);
        },
        error: function(jqXHR, textStatus, errorThrown) {}
    });
});