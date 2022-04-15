$(document).ready(function() {
    var slideIndex = 1
    $(".dots span").eq(0).css("background", "dodgerblue")
    $(".dots span").click(function() {
        var dataIndex = $(this).data("index")
        showSlide(dataIndex)
    })
    $(".prev").click(function() {
        pluseSlide(-1)
    })
    $(".next").click(function() {
        pluseSlide(1)
    })
    function pluseSlide(n) {
        slideIndex += n
        showSlide(slideIndex)
    }
    function showSlide(n) {
        var dots = $(".dots span")
        if(n >= dots.length) {slideIndex = 0}
        if(n < 1) {slideIndex = dots.length}
        var src = dots[n - 1].getAttribute("data-toggle")
        dots.eq(n-1).css("background", "dodgerblue").siblings().css("background", "white")
        $(".slide-container .image-container img").attr("src", src)
    }
    setInterval(function() {
        pluseSlide(1)
    }, 3000) 
    $("#search_btn").on("click", function(e) {
        e.preventDefault();
        let spinner = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
        let searchItem = $("#search").val();
        $('#search_btn').html(spinner);
        if(searchItem) {
            $.ajax({
                url: 'getDonor.php',
                type: 'POST',
                data: {search: searchItem},
                success: function(data) {
                    $("#search-data-row").html(data);
                }
            })
        } else {
            alert("Fill Up Search Box");
        }
    })
})