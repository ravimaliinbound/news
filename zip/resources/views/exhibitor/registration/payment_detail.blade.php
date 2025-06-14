<table class="table">
    <thead>
        <tr>
            <th width="50%">Head</th>
            <th width="30%">Detail(Sq Mt x Unit Rate)</th>
            <th width="20%">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paymentDetail['detail'] as $pk => $pv)
            <input type="hidden" name="data[{{ $pk }}][head_id]" value="{{ $pv['head_id'] }}" >
            <input type="hidden" name="data[{{ $pk }}][rate]" value="{{ $pv['rate'] }}" >
            <input type="hidden" name="data[{{ $pk }}][total]" value="{{ $pv['total'] }}" >
            <input type="hidden" name="data[{{ $pk }}][type]" value="{{ $pv['type'] }}" >
            
            <tr>
                <td>{!! $pv['head'] !!}</td>
                <td>{{ $pv['detail'] }}</td>
                <td>{{ $pv['price'] }}</td>
            </tr>
        @endforeach
        <tr style="background: #B0C5A4;">
            <td><b>To be Paid (If full payment made before 15th June 2024)</b></td>
            <td></td>
            <td>
                Subtotal : ₹ {{ indian_number_format($paymentDetail['subtotal']) }}<br />
                @if($paymentDetail['state'] == 24)
                    CGST : ₹{{ indian_number_format($paymentDetail['gst'] / 2)  }}<br />
                    SGST : ₹{{ indian_number_format($paymentDetail['gst'] / 2)  }}<br />
                @else
                    IGST : ₹{{ indian_number_format($paymentDetail['gst']) }}<br />
                @endif
                <b style="font-size: 20px;">Total : ₹{{ indian_number_format($paymentDetail['total']) }}</b>
            </td>
        </tr>
        <tr>
            <td colspan="3"><center><b>OR</b></center></td>
        </tr>
        <tr style="background: #D37676;">
            <td><b>To be Paid (If partial payment made <small>(booking confirmation & registration fees)</small> before 15th June 2024)</b></td>
            <td></td>
            <td>
                Subtotal : ₹ {{ indian_number_format($paymentDetail['after_subtotal']) }}<br />
                @if($paymentDetail['state'] == 24)
                    CGST : ₹{{ indian_number_format($paymentDetail['after_gst'] / 2)  }}<br />
                    CGST : ₹{{ indian_number_format($paymentDetail['after_gst'] / 2)  }}<br />
                @else
                    IGST : ₹{{ indian_number_format($paymentDetail['after_gst'])  }}<br />
                @endif
                <b style="font-size: 20px;">Total : ₹{{ indian_number_format($paymentDetail['after_total']) }}</b>
            </td>
            <input type="hidden" name="subtotal" value="{{ $paymentDetail['subtotal'] }}" >
            <input type="hidden" name="gst" value="{{ $paymentDetail['gst'] }}" >
            <input type="hidden" name="total" value="{{ $paymentDetail['total'] }}" >
        </tr>
        <tr></tr>
        <tr>
            <td>
                <p><b>BANK DETAILS:<br>
                A/c. Name: GUJARAT STATE PLASTIC MANUFACTURERS ASSOCIATION <br>
                Bank: Bank of India. | Branch: Paldi, Ahmedabad<br>
                A/c No.: 201120100000151 | IFSC Code: BKID0002011<br>
                UPI : boism-9426426567@boi<br/>
                PAN: AAATG3563A | GSTN: 24AAATG3563A1Z9</b></p>
            </td>
        <tr>
    </tbody>
</table>