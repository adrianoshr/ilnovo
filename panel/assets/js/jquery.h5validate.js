(function(j){var i=window.console||function(){},m={defaults:{debug:false,RODom:false,patternLibrary:{phone:/([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9A-Za-z \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)/,email:/((([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?/,url:/(https?|ftp):\/\/(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?/,number:/-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?/,dateISO:/\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}/,alpha:/[a-zA-Z]+/,alphaNumeric:/\w+/,integer:/-?\d+/},classPrefix:"h5-",errorClass:"ui-state-error",validClass:"ui-state-valid",activeClass:"active",requiredClass:"required",requiredAttribute:"required",patternAttribute:"pattern",errorAttribute:"data-h5-errorid",customEvents:{validate:true},kbSelectors:":input:not(:button):not(:disabled):not(.novalidate)",focusout:true,focusin:false,change:true,keyup:false,activeKeyup:true,mSelectors:'[type="range"]:not(:disabled):not(.novalidate), :radio:not(:disabled):not(.novalidate), :checkbox:not(:disabled):not(.novalidate), select:not(:disabled):not(.novalidate), option:not(:disabled):not(.novalidate)',click:true,requiredVar:"h5-required",patternVar:"h5-pattern",stripMarkup:true,submit:true,focusFirstInvalidElementOnSubmit:true,validateOnSubmit:true,invalidCallback:function(){},validCallback:function(){},allValidSelectors:":input:visible:not(:button):not(:disabled):not(.novalidate)",markInvalid:function p(s){var r=j(s.element),q=j(s.errorID);r.addClass(s.errorClass).removeClass(s.validClass);r.addClass(s.settings.activeClass);if(q.length){if(r.attr("title")){q.text(r.attr("title"))}q.show()}r.data("valid",false);s.settings.invalidCallback.call(s.element,s.validity);return r},markValid:function e(s){var r=j(s.element),q=j(s.errorID);r.addClass(s.validClass).removeClass(s.errorClass);if(q.length){q.hide()}r.data("valid",true);s.settings.validCallback.call(s.element,s.validity);return r},unmark:function n(r){var q=j(r.element);q.removeClass(r.errorClass).removeClass(r.validClass);q.form.find("#"+r.element.id).removeClass(r.errorClass).removeClass(r.validClass);return q}}},h=m.defaults,l=h.patternLibrary,k=function k(q){return j.extend({customError:q.customError||false,patternMismatch:q.patternMismatch||false,rangeOverflow:q.rangeOverflow||false,rangeUnderflow:q.rangeUnderflow||false,stepMismatch:q.stepMismatch||false,tooLong:q.tooLong||false,typeMismatch:q.typeMismatch||false,valid:q.valid||true,valueMissing:q.valueMissing||false},q)},f={isValid:function(r,q){var s=j(this);q=(r&&q)||{};if(q.revalidate!==false){s.trigger("validate")}return s.data("valid")},allValid:function(s,z){var q=true,v=[],x=j(this),w,y,t=[],r=function r(B,A){A.e=B;v.push(A)},u=j.extend({},s,z);z=z||{};x.trigger("formValidate",{settings:j.extend(true,{},u)});x.undelegate(u.allValidSelectors,".allValid",r);x.delegate(u.allValidSelectors,"validated.allValid",r);w=x.find(u.allValidSelectors);y=w.filter(function(B){var A;if(this.tagName==="INPUT"&&this.type==="radio"){A=this.name;if(t[A]===true){return false}t[A]=true}return true});y.each(function(){var A=j(this);q=A.h5Validate("isValid",z)&&q});x.trigger("formValidated",{valid:q,elements:v});return q},validate:function(r){var A=j(this),x=A.filter("[pattern]")[0]?A.attr("pattern"):false,D=new RegExp("^(?:"+x+")$"),y=null,B=(A.is("[type=checkbox]"))?A.is(":checked"):(A.is("[type=radio]")?(y=A.parents("form").find('input[name="'+A.attr("name")+'"]')).filter(":checked").length>0:A.val()),t=r.errorClass,z=r.validClass,v=A.attr(r.errorAttribute)||false,s=v?"#"+v.replace(/(:|\.|\[|\])/g,"\\$1"):false,w=false,u=k({element:this,valid:true}),C=j("<input required>"),q;if(C.filter("[required]")&&C.filter("[required]").length){w=(A.filter("[required]").length&&A.attr("required")!=="false")}else{w=(A.attr("required")!==undefined)}if(r.debug&&window.console){i.log('Validate called on "'+B+'" with regex "'+D+'". Required: '+w);i.log("Regex test: "+D.test(B)+", Pattern: "+x)}q=parseInt(A.attr("maxlength"),10);if(!isNaN(q)&&B.length>q){u.valid=false;u.tooLong=true}if(w&&!B){u.valid=false;u.valueMissing=true}else{if(x&&!D.test(B)&&B){u.valid=false;u.patternMismatch=true}else{if(!r.RODom){r.markValid({element:this,validity:u,errorClass:t,validClass:z,errorID:s,settings:r})}}}if(!u.valid){if(!r.RODom){r.markInvalid({element:this,validity:u,errorClass:t,validClass:z,errorID:s,settings:r})}}A.trigger("validated",u);if(y!==null&&r.alreadyCheckingRelatedRadioButtons!==true){r.alreadyCheckingRelatedRadioButtons=true;y.not(A).trigger("validate");r.alreadyCheckingRelatedRadioButtons=false}},delegateEvents:function(u,q,t,v){var s={},r=0,w=function(){v.validate.call(this,v)};j.each(q,function(x,y){if(y){s[x]=x}});for(r in s){if(s.hasOwnProperty(r)){j(t).delegate(u,s[r]+".h5Validate",w)}}return t},bindDelegation:function(q){var r=j(this),s;j.each(l,function(t,v){var u=v.toString();u=u.substring(1,u.length-1);j("."+q.classPrefix+t).attr("pattern",u)});s=r.filter("form").add(r.find("form")).add(r.parents("form"));s.attr("novalidate","novalidate").submit(o);s.find("input[formnovalidate][type='submit']").click(function(){j(this).closest("form").unbind("submit",o)});return this.each(function(){var v={focusout:q.focusout,focusin:q.focusin,change:q.change,keyup:q.keyup},t={click:q.click},u={keyup:q.activeKeyup};q.delegateEvents(":input",q.customEvents,this,q);q.delegateEvents(q.kbSelectors,v,this,q);q.delegateEvents(q.mSelectors,t,this,q);q.delegateEvents(q.activeClassSelector,u,this,q);q.delegateEvents("textarea[maxlength]",{keyup:true},this,q)})}},o=function(q){var t,r=g.call(this),u;if(r.submit!==true){return}t=j(this);u=t.h5Validate("allValid",{revalidate:r.validateOnSubmit===true});if(u!==true){q.preventDefault();if(r.focusFirstInvalidElementOnSubmit===true){var s=j(r.allValidSelectors,t).filter(function(v){return j(this).h5Validate("isValid",{revalidate:false})!==true});s.first().focus()}}return u},a=[],d=function d(q){var s=j.extend({},h,q,f),r=s.classPrefix+s.activeClass;return j.extend(s,{activeClass:r,activeClassSelector:"."+r,requiredClass:s.classPrefix+s.requiredClass,el:this})},g=function g(){var q=j(this).closest("[data-h5-instanceId]");return a[q.attr("data-h5-instanceId")]},c=function c(q){var r=a.push(q)-1;if(q.RODom!==true){j(this).attr("data-h5-instanceId",r)}j(this).trigger("instance",{"data-h5-instanceId":r})};j.h5Validate={addPatterns:function(r){var s=h.patternLibrary,q;for(q in r){if(r.hasOwnProperty(q)){s[q]=r[q]}}return s},validValues:function(q,r){var s=0,u=r.length,v="",t;for(s=0;s<u;s+=1){v=v?v+"|"+r[s]:r[s]}t=new RegExp("^(?:"+v+")$");j(q).data("regex",t)}};j.fn.h5Validate=function b(r){var t,q,s;if(typeof r==="string"&&typeof f[r]==="function"){s=g.call(this);q=[].slice.call(arguments,0);t=r;q.shift();q=j.merge([s],q);return s[t].apply(this,q)}s=d.call(this,r);c.call(this,s);return f.bindDelegation.call(this,s)}}(jQuery));