/* ==================================== */
             /* Invite-h5 */
             /* Simon_tal */
         /* 2016-4-6 11:02:35 */ 
/* ==================================== */

'use strict';

$(document).ready(function(){
    /* Global Variables */
    var loaderbox = $("#loaderbox"),
    loaderele = $("#loaderbox .loader"),
    musicplay = $("#musicplay"),
    audiosrc = $("audio")[0],
    logotext = $("#logotext"),
    envelop_front = $("#envelop_front"),
    envelop = $('#envelop'),
    envelop_back = $('#envelop_back'),
    envelop_back_img = $('.envelop .back img'),
    envelop_seal = $('#envelop_seal'),
    s_letter = $('#s_letter'),
    start_map = $("#startmap"),
    letter1 = $('#letter1'),
    letter1_inner_p = $('#letter1 .letter_inner p'),
    letter3 = $('#letter3'),
    mymap = $("#mymap"),
    letter3_top = $("#letter3 .letter_top"),
    infobox_input = $("#infobox input"),
    light_map = $("#lightmap"),
    hithereform = $("#hithereform"),
    loaderseq,
    seq1,
    seq2;

    /* Motion speed */
    $.Velocity.mock = 0.8;

    /* Const */
    var AFTER_D_CODE = '<span class="dib">6</span><span class="dib">2</span><span class="dib">5</span><span class="dib">0</span><span class="dib">1</span><span class="dib">4</span>'

    /* Global Functions */

    function checkChn(formid,inputname,errortxt) {
        var inputObj = $(formid+' input[name='+inputname+']');
        var pattern = /^[\u4e00-\u9fa5]{2,12}$/;
        if (pattern.test(inputObj.val())) {
            return true;
        }
        else {
            console.log(errortxt);
            $(inputObj).val('');
            $(inputObj).attr('placeholder',errortxt)
            $(inputObj).velocity('callout.shake',300);
            return false;
        }
    }

    function checkChnPunc(formid,inputname,errortxt) {
        var inputObj = $(formid+' input[name='+inputname+']');
        if (inputObj.val()) {
            return true;
        }
        else {
            console.log(errortxt);
            $(inputObj).val('');
            $(inputObj).attr('placeholder',errortxt)
            $(inputObj).velocity('callout.shake',300);
            return false;
        }
    }

    function checkNum(formid,inputname,errortxt) {
        var inputObj = $(formid+' input[name='+inputname+']');
        var pattern = /^[0-9]{4}$/;
        if (pattern.test(inputObj.val())) {
            console.log('正确');
            return true;
        }
        else {
            console.log(errortxt);
            $(inputObj).val('');
            $(inputObj).attr('placeholder',errortxt)
            $(inputObj).velocity('callout.shake',300);
            return false;
        }
    }

    infobox_input
    .on("focus",function(){
        mymap.hide();
        letter3_top.hide();
    })
    .on("blur",function(){
        mymap.show();
        letter3_top.show();
    })

    /* Loader */
    loaderseq = [
        {
            e:loaderele,
            p:"transition.bounceUpOut",
            o:{duration:1600,delay:500,complete:function(){loaderele.remove();}}
        },
        {
            e:loaderbox,
            p:{translateY:["-100%",0]},
            o:{duration:800,sequenceQueue:false,delay:400,complete:function(){loaderbox.remove();}}
        },
        {
            e:logotext,
            p:"transition.slideDownBigIn",
            o:{duration:1000,sequenceQueue:false,delay:300}
        },
        {
            e:envelop,
            p:"transition.slideUpBigIn",
            o:{duration:1000,sequenceQueue:false}
        }
    ];

    $.Velocity.RunSequence(loaderseq);

    /* Music */

    musicplay.on('touchstart',function(){
        if (audiosrc.paused) {
            audiosrc.play();
            $(this).addClass('play');
        } else {
            audiosrc.pause();
            $(this).removeClass('play');
        };
    });

    loaderbox.on('touchstart',function(){
        audiosrc.play();
    });

    /* ACTION */
    ;envelop_front.one('touchstart',function(){
        seq1 = [
            {
                e:logotext,
                p:"transition.fadeOut",
                o:{duration:800}
            },
            { 
                e: envelop, 
                p: { top:0,bottom:0}, 
                o: { duration: 600,sequenceQueue:false } 
            },
            { 
                e: envelop_front, 
                p: { rotateY:[90,'liner',0]}, 
                o: { duration: 600 } 
            },
            { 
                e: envelop_back, 
                p: {opacity:[1,0],rotateY:[0,-90],begin: function(elements) { envelop_front.hide();}}, 
                o: { duration: 600,delay:540,sequenceQueue:false} 
            },
            { 
                e: s_letter, 
                p: {zIndex:2}, 
                o: { sequenceQueue: false} 
            },
            { 
                e: envelop_seal, 
                p: {rotateX:[180,0]}, 
                o: { duration: 800} 
            },
            { 
                e: envelop_back_img, 
                p: {opacity:[0,1]}, 
                o: { duration: 0,sequenceQueue: false,delay: 400,complete: function(elements) { envelop_seal.addClass('after');}} 
            },
            { 
                e: s_letter, 
                p: {opacity:[1,0]}, 
                o: { duration: 300,sequenceQueue: false} 
            },
            { 
                e: envelop, 
                p: {opacity:[0,1],translateY:'100%'}, 
                o: { duration: 800} 
            },
            { 
                e: s_letter, 
                p: { height:['100%'],top:[0,'-25.5%'],width:['100%']}, 
                o: { duration: 800,sequenceQueue: false,begin: function(elements) { s_letter.addClass('after');}, complete: function() { start_map.velocity("transition.slideDownIn",600);}}
            },
            {
                e:letter1_inner_p,
                p:'transition.fadeIn',
                o:{duration:600,sequenceQueue:false,delay:480}
            }
        ];
        audiosrc.play();
        $.Velocity.RunSequence(seq1);
    });

    start_map.one('touchstart',function(){
        letter3.velocity("transition.slideDownIn",{
            duration:1200,
            begin:function() {
                start_map.velocity("transition.fadeOut");
            },
            complete:function(e) {
                light_map.velocity("transition.slideDownIn",400);
                $('#ae_name').html('西南石油大学收');
                $('#ae_dcode').html(AFTER_D_CODE);
                $('#ae_scode').remove();
            }
        });
    });

    light_map.on('click',function() {
        seq2 = [
        {
            e:light_map,
            p: {opacity:[0,1]}, 
            o: { duration: 300} 
        },
        {
            e:envelop,
            p: {opacity:[1,0],translateY:[0,'100%']}, 
            o: { duration: 600} 
        },
        {
            e:s_letter,
            p:{ height:['12vh'],top:['-25.5%',0],width:['91vw']},
            o:{ duration:600,sequenceQueue: false,begin:function(){s_letter.removeClass('after')}}
        },
        { 
            e: envelop_seal, 
            p: {rotateX:[0,180]}, 
            o: { duration: 600} 
        },
        { 
            e: envelop_back_img, 
            p: {opacity:[1,0]}, 
            o: { duration: 0,sequenceQueue: false,delay: 300,complete: function(elements) { envelop_seal.removeClass('after');}} 
        },
        { 
            e: s_letter, 
            p: {opacity:[0,1]}, 
            o: {sequenceQueue: false,complete:function(){s_letter.remove();}} 
        },
        { 
            e: envelop_back, 
            p: { rotateY:[-90,0]}, 
            o: { duration: 500} 
        },
        { 
            e: envelop_front, 
            p: { rotateY:[0,'liner',90]}, 
            o: { duration: 500 ,begin:function(elements) { envelop_front.show();envelop_back.remove();}} 
        },
        { 
            e: envelop, 
            p: { rotateX:[60,'liner',0],translateY:['30%',0],scale:[1.1,1]}, 
            o: { duration: 400} 
        },
        { 
            e: envelop, 
            p: { translateY:['-100%','20%'],scale:[0.01,1]}, 
            o: { duration: 500} 
        },
        { 
            e: $('#scene1'), 
            p: { opacity:[0,1]}, 
            o: { duration: 500,sequenceQueue: false,delay:300,
                complete: function() { 
                    console.log('done');
                    document.location.href = '/map/there';
              }
          } 
      },
      ];

        $.ajax({
            'type':'POST',
            'url':'/map/ajax/hithere',
            'data':$("#hithereform").serialize(),
            'dataType':'json',
            'beforeSend':function(){
                console.log('validate');
                if (checkChn('#hithereform','name','请输入中文姓名')&checkChnPunc('#hithereform','major','请输入专业名称')&checkNum('#hithereform','year','请输入4位数字')) {
                    return true;
                }
                else {
                    return false;
                }
            },
            'complete':function(){
                $.Velocity.RunSequence(seq2);
            }
        });
  });

    
});
