/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(function($) {
    var $contentarea = $(".content-area");
    var $buttoncatat = $(".button-catat");
    var $mdcontentarea = $(".markdown-content-area");
    //$contentarea.hide();
    //$buttoncatat.hide();
    $mdcontentarea.on('click',function(){
        var $this = $(this);
        var $contentId = $(this).attr('data-id');
        var $editableContent = $("#editable-content-"+$contentId);
        var $thisContentArea = $('#content-'+$contentId).show();
        var $thisbuttoncatat = $('#button-catat-'+$contentId).show();
        
        $(".isActive").toggle().removeClass('isActive');
        $(".isHide").toggle().removeClass('isHide');
        
        $editableContent.show();
        $editableContent.addClass('isActive');
        $this.addClass('isHide');
        $this.hide();
        $thisContentArea.focus();
       
        
    });
    var $simpancatat = $('.simpancatat');
    $simpancatat.on('click',saveCatat);
    function saveCatat(){
        var $this = $(this);
        var $idContent = $this.attr('data-id');
        var $mdContent = $("#contentmd-"+$idContent);
        
        var $content = $("#content-"+$idContent);
        //var data = $('#form-'+$idContent).serialize();
        var data = {
                'contents': $content.html(),
                'id':$idContent,
                'post_id': $this.attr('data-post-id'),
                'ajax':'save-catat'
            };
            alert($content.html())
        var jqxhr = $.post( $this.attr('data-url'), data, function(output) {
                $mdContent.html(output);
                $(".isHide").toggle().removeClass('isHide');
                $(".isActive").toggle().removeClass('isActive');
                
            })
            /*.done(function() {
              alert( "second success" );
            })*/
            .fail(function() {
              alert( "error" );
            })
            /*.always(function() {
              alert( "finished" );
            })*/;
        
    }

});

