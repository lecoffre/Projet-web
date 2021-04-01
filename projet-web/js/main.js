//multiplechoix pour les delegues
$(document).ready(function(){
    var multipleCancelButton = new Choices('#droit_delegue', {
    removeItemButton: true,
    maxItemCount:2,
    searchResultLimit:15,
    renderChoiceLimit:15
    });
     });