loadPosts(0, '', '');
// Load more data
$('.load-more').click(function(){
    var row = Number($('#row').val());
    var cat = Number($("#selectCat").val());
    var most = $(".js-select2").val();
    loadPosts(row, cat, most);
});

function loadPosts(row = 0, cat = '', most = '') {
    var allcount = Number($('#all').val());
    row = row + 1;
    if(row < allcount) {
        $(".load-more").text("Load more");
        $('.load-more').show();
    }
    if(row <= allcount) {
        $("#row").val(row);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: pw1_script_vars.ajaxurl,
            data: {
                action: 'load_more_posts',
                security: pw1_script_vars.security,
                row: row,
                cat: cat,
                most: most
            },
            beforeSend:function(){
                $(".load-more").text("Loading...");
            },
            success: function(response){
				console.log(row, allcount);
                setTimeout(function() {
                    var $html = '';
                    $(response.data).each(function(index, val) {
                        $html += val;
                    });
                    
                    if(row >= allcount) {
                        $('.load-more').text("Load more");
                    } else {
                        $(".load-more").hide();
                    }
                    $("#load_posts").html($html);

                    // checking row value is greater than allcount or not
                    if (response.data.length == 0) {
                        $('.load-more').hide();
                    }
					
                }, 2000);
            }
        });
    } else {
        $('.load-more').text("Loading...");
        // Setting little delay while removing contents
        setTimeout(function() {
            // Reset the value of row
            $("#row").val(0);
            // Change the text and background
            $('.load-more').text("Load more");
            $('.load-more').css("background","#15a9ce");
        }, 2000);
    }
}

$(".category-div li a").on("click", function() {
    var selectedCat = $(this).data('catid');
    $("#selectCat").val(selectedCat);
    var most = $(".js-select2").val();
    loadPosts(0, selectedCat, most);
    $(".category-div li a").each(function(index, val){
        $(val).removeClass('active');
    });
    $(this).addClass('active');
});

$(".js-select2").on("change", function() {
    var mostOption = $(this).val();
    loadPosts(0, $("#selectCat").val(), mostOption);
});