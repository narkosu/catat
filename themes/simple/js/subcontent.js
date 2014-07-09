/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(function($) {
    var $contentarea = $(".content-area");
    var $buttoncatat = $(".button-catat");
    var $mdcontentarea = $(".markdown-content-area");
    $contentarea.hide();
    $buttoncatat.hide();
    $mdcontentarea.on('click',function(){
        var $this = $(this);
        var $contentId = $(this).attr('data-id');
        var $thisContentArea = $('#content-'+$contentId).show();
        var $thisbuttoncatat = $('#button-catat-'+$contentId).show();
        $thisContentArea.focus();
        $thisbuttoncatat.show();
        $this.hide();
        $thisContentArea.on('blur', function(){
            $thisbuttoncatat.hide();
            $thisContentArea.hide();
            $this.show();
        });
        
    });
    
    

});

