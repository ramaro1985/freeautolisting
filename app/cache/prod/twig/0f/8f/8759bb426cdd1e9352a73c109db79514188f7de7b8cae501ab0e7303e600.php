<?php

/* AdminBundle:Default:owner-support-form.html.twig */
class __TwigTemplate_0f8f8759bb426cdd1e9352a73c109db79514188f7de7b8cae501ab0e7303e600 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"modal fade\" id=\"myModalSupport\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Contact HomeEscape Support</h4>
            </div>
            <div class=\"modal-body\">
                <form id=\"formSupportContact\" action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("contact_owner_support");
        echo "\" method=\"POST\" class=\"form-horizontal\">
                    
                    <div class=\"form-group\" style=\"margin-bottom: 10px\">
                        <div class=\"col-sm-12 col-xs-12 text-left\">
                            <label>Message</label>
                        </div>
                        <div class=\"col-sm-12 col-xs-12\">
                            <textarea class=\"form-control\" id=\"mensaje\" name=\"mensaje\"></textarea>
                        </div>

                    </div>
                </form>
            </div>
            <div class=\"modal-footer\">
                <div class=\"row\">
                    <div class=\"col-md-7 col-sm-7 col-xs-12\"><div id=\"error\"></div></div>
                    <div class=\"col-md-5 col-sm-5 col-xs-12\">
                        <button type=\"button\" class=\"btn btn-default close-btn\" data-dismiss=\"modal\">Close</button>
                        <button type=\"button\" class=\"btn btn-primary confirm-send\">Contact</button>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type=\"text/javascript\">

    jQuery(document).ready(function () {



        function disableFormContactReservation() {
            jQuery('#myModalSupport #formSupportContact').find('textarea').attr('disabled', 'disabled')
            jQuery(\"#myModalSupport #formSupportContact\").css(\"opacity\", 0.37);
        }



        function enableFormContactReservation() {
            jQuery('#myModalSupport #formSupportContact').find('textarea').val('');
            jQuery('#myModalSupport #formSupportContact').find('textarea').removeAttr('disabled');
            jQuery(\"#myModalSupport #formSupportContact\").css(\"opacity\", 1);
        }

        function submitFormContactReservation() {

            jQuery.ajax({
                statusCode: {
                    500: function () {
                        //enableFormConfirmReservation();
                        jQuery('#myModalSupport #error').html(\"<span class='glyphicon glyphicon-warning-sign' style='margin-right:15px;color:#d9534f'></span><span class='text-danger'>There was an error, try again</span>\");
                    }
                },
                url: jQuery('#myModalSupport #formSupportContact').attr('action'),
                type: \"POST\",
                data: {mensaje: jQuery('#mensaje').val()},
                async: false,
                success: function (response) {
                    enableFormContactReservation();
                    jQuery('#myModalSupport').modal('hide');
                }
            });
        }


        jQuery('#myModalSupport .confirm-send').click(function (e) {
           
            validateFormContact();

        });

  jQuery('#myModalSupport').find('textarea').each(function(){
    jQuery(this).focusout(function(){
    jQuery(this).popover('destroy');
    });
    });


        function validateFormContact() {
            var bValid = true;
            bValid = bValid && checkLength(jQuery('#myModalSupport #mensaje'), 5, 500);
            if (bValid) {
                disableFormContactReservation();
                submitFormContactReservation();
            }

        }
        
          function checkLength(o, min, max) {
            if (o.val().length < min) {
            createPopover(o, 'Please fill out this field');
                    return false;
            } else {
            return true;
            }
            }
            
                function createPopover(elem, text){
                elem.attr('data-toggle', 'popover');
                    elem.attr('data-placement', 'bottom');
                    elem.attr('data-content', text);
                    elem.attr('data-container', 'body');
                    elem.popover();
                    elem.trigger('click');
                    elem.focus();
            }

    });






</script>";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Default:owner-support-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  185 => 104,  178 => 101,  170 => 98,  156 => 91,  154 => 90,  144 => 83,  134 => 76,  130 => 75,  110 => 57,  101 => 53,  90 => 47,  83 => 43,  70 => 36,  65 => 33,  63 => 32,  19 => 1,  251 => 96,  246 => 95,  243 => 94,  238 => 87,  232 => 80,  226 => 75,  201 => 30,  195 => 112,  191 => 26,  187 => 25,  183 => 24,  179 => 23,  175 => 22,  171 => 21,  166 => 20,  163 => 94,  157 => 17,  153 => 16,  149 => 15,  145 => 14,  141 => 13,  136 => 11,  131 => 10,  128 => 9,  122 => 7,  117 => 6,  106 => 98,  104 => 54,  96 => 88,  94 => 87,  86 => 81,  84 => 80,  78 => 76,  76 => 75,  50 => 52,  47 => 22,  42 => 9,  36 => 7,  34 => 6,  27 => 7,  99 => 23,  91 => 19,  85 => 17,  79 => 15,  77 => 40,  72 => 13,  69 => 12,  62 => 10,  55 => 27,  49 => 6,  44 => 19,  41 => 4,  33 => 3,);
    }
}
