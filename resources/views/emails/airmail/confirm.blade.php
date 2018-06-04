@extends('emails.airmail.layouts')
@section('contents')
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="text-align:center; font-size:30px; padding-bottom:20px;">
                Your order has been shipped!
            </td>
        </tr>
        <tr>
            <td style="padding-bottom:20px;">
                Hello Bob, <br>
                <br>
                We would like you to know that your order has shipped! To view your order or make any changes please
                click the "my order" button below.<br>
                <br>
                <b><a class="blue-link" href="#">Track shipping</a></b>
            </td>
        </tr>
    </table>
@endsection