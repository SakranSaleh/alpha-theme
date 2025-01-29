// (function($){
//     $(document).ready(function(){
//         $(".popup").each(function(){
//             var imges = $(this).find("img").attr("src");
//             $(this).attr("href", imges);
//         });
//     });
// })(jQuery);


// jQuery(document).ready(function($) {
//     $(".popup").each(function() {
//         var imges = $(this).find("img").attr("src");
//         if (imges) {
//             $(this).attr("href", imges);
//         }
//     });
// });



(function($) {
    $(document).ready(function() {
        $(".popup").each(function() {
            var imges = $(this).find("img").attr("src");
            if (imges) { // Ensure the src is valid
                $(this).attr("href", imges);
            }
        });
    });
})(jQuery);


// (function($){
//     $(document).ready(function(){
//         $(".popup").each(function(){
//             var $img = $(this).find("img");
//             if ($img.length) {
//                 var imge = $img.attr("src");
//                 $(this).attr("href", imge);
//             }
//         });
//     });
// })(jQuery);