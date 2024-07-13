$(document).ready(function(){
    // Initialize current page and rows per page
    var cp = 1;
    var rpp = parseInt($("#rowsPerPage").val());
    
    // Get all table rows
    var $tr = $(".table tbody tr");
    
    // Calculate total pages
    var tp = Math.ceil($tr.length / rpp);

    // Function to show/hide table rows based on current page and rows per page
    function sp(p) {
        var s = (p - 1) * rpp;
        var e = s + rpp;

        // Hide all rows and show only the rows for the current page
        $tr.hide().slice(s, e).show();

        // Remove existing page number links
        $(".page-item.pageNumber").remove();

        // Calculate start and end page numbers for pagination links
        var sp = Math.max(1, cp - 1);
        var ep = Math.min(sp + 2, tp);

        // Create pagination links
        for (var i = sp; i <= ep; i++) {
            var $li = $("<li>", { class: "page-item pageNumber" });
            var $link = $("<a>", { class: "page-link", href: "#", text: i });
            if (i === cp) {
                $li.addClass("active");
            }
            $li.append($link);
            $li.insertBefore("#nextPage");
        }
    }

    // Function to go to previous page
    function gtp() {
        if (cp > 1) {
            cp--;
            sp(cp);
        }
    }

    // Function to go to next page
    function gtn() {
        if (cp < tp) {
            cp++;
            sp(cp);
        }
    }

    // Update rows per page and total pages when rows per page changes
    $("#rowsPerPage").on("change", function() {
        rpp = parseInt($(this).val());
        tp = Math.ceil($tr.length / rpp);
        sp(cp);
    });

    // Initialize pagination on page load
    sp(cp);

    // Event handlers for pagination links
    $("#previousPage").on("click", gtp);
    $("#nextPage").on("click", gtn);

    $(document).on("click", ".pageNumber", function() {
        var p = parseInt($(this).text());
        cp = p;
        sp(cp);
    });
});