@extends('emails.narrative.layouts')
@section('contents')
    <tr>
        <td style="border-bottom:1px solid #e7e7e7;">

            <center>
                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                    <tr>
                        <td align="left" class="mobile-padding" style="padding:20px 20px 0">

                            <br class="mobile-hide" />

                            <h3>重置密码</h3>
                            <p>如果您并没有访问过 {{$websiteName}} 或者没有进行上述操作，请忽略这封邮件。</p>
                            <p>点击下面的链接重新设置密码（30分钟内有效）。</p>
                            <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                                <tr>
                                    <td style="width:130px;background:#D84A38;">
                                        <div>
                                            <!--[if mso]>
                                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:130px;" stroke="f" fillcolor="#D84A38">
                                                <w:anchorlock/>
                                                <center>
                                            <![endif]-->
                                            <a href="{{$resetPasswordUrl}}"
                                               style="background-color:#D84A38;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:33px;text-align:center;text-decoration:none;width:130px;-webkit-text-size-adjust:none;">【重设密码】</a>
                                            <!--[if mso]>
                                            </center>
                                            </v:rect>
                                            <![endif]-->
                                        </div>
                                    </td>
                                    <td width="316" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                                </tr>
                            </table>
                            <p>
                                如果无法点击请复制地址到浏览器打开：{{$resetPasswordUrl}}
                            </p>
                            <br><br>
                        </td>
                        <td class="mobile-hide" style="padding-top:20px;padding-bottom:0;vertical-align:bottom">
                        </td>
                    </tr>
                </table>
            </center>

        </td>
    </tr>
    {{--<tr>--}}
    {{--<td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;">--}}

    {{--<center>--}}
    {{--<table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;">--}}
    {{--<tr>--}}
    {{--<td valign="top" class="mobile-padding" style="padding:20px;">--}}
    {{--<h2>Enjoy 50% off!</h2>--}}
    {{--<br>--}}
    {{--You'll be the first to hear about new arrivals, exclusive promotionas, cool collaborations, and the latest in everything.<br>--}}
    {{--<br>--}}
    {{--Enter <b>XLKIJP6887F</b> at your next checkout!<br><br>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--</table>--}}
    {{--</center>--}}

    {{--</td>--}}
    {{--</tr>--}}

@endsection
