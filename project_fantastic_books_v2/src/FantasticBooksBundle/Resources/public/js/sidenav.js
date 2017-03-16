/**
 * Created by gosia on 16.03.17.
 */

jQuery(function(){

    // console.log('HELLO WORLD :D');

    var BUTTON = jQuery('#buttonCreate');
    // console.log(BUTTON);

    var SUBMIT = jQuery('#submitCreate');
    // console.log(SUBMIT);

    BUTTON.click(function(){
        // console.log('click');
        SUBMIT.submit();
    });

});
