<?php echo form_open('news/create') ?>
<?php $string = '<div><div>';
echo form_open($string);?>
<div class="front_page" id="divToPrint">
<div class="text-center">
<caption>FORM 16</caption><BR/>
<caption>[See rule31(1)(a)]</caption>
</div>
<table class="table table-bordered table_input"> 
<tr> <th colspan="5" class="text-center">Certificate under section 203 of the Income-tax Act, 1961 for Tax deducted a source from chargeable under the head "Salaries"</th> </tr> 
<tr class="text-center">
    <td colspan="2"><label for="text">Name and address of the Employer</label></td>
    <td colspan="3"><label for="text">Name and Designation of the Employee</label></td> 
</tr>
<tr style="height:100px">
    <td colspan="2"><?php echo $setting->name;?><br/><?php echo $setting->address; ?></td>
    <td colspan="3"><?php echo $query->firstname;?><br/><?php echo $query->address_1.','.$query->address_2;?></td> 
</tr>
<tr>     
    <td colspan="2"><label for="text">PAN of the Deductor</label><br/>
    <td><label for="text">TAN of the Deductor</label><br /></td>
    <td colspan="2"><label for="text">PAN of the Employee</label><br /></td> 
</tr>
<tr>
    <td colspan="2"><input type="text" value="<?php echo $setting->pan; ?>" readonly class="form-control"></td>       
    <td><input type="text" value="<?php echo $setting->tan; ?>" readonly class="form-control"></td>       
    <td colspan="2"><input type="text" value="<?php echo $query->pan; ?>" readonly class="form-control"></td>     
</tr>
<tr>
        <td colspan="2"><label for="text">Acknowledgement Nos of all quarterly statements of TDS under sub-section(3)of section 200 as provided by TIN Facilitation Center of NSDL Web-site.</label><br/></td>
        <td class="text-center" rowspan="2"><label for="text">Assessment Year</label> </td>
        <td colspan="2" class="text-center"><label for="text">Period</label>
</tr>
<tr>
        <td><label for="text">Quarter</label></td>
        <td><label for="text">Acknowledgment No.</label></td>
        <td><label for="text">From</label></td>
        <td><label for="text">To</label></td>
</tr>
<tr style="height:90px"><td>&nbsp;</td><td>&nbsp;</td><td><?php echo $batch->start_date+ 1; ?>-<?php echo $batch->end_date+ 1; ?></td><td><?php echo $batch->start_date;?></td><td><?php echo $batch->end_date; ?></td></tr>

<tr><th colspan="5" class="text-center">DETAILS OF SALARY PAID AND ANY OTHER INCOME AND TAX DEDUCTED</th></tr>
<tr><td colspan="2">1. Gross Salary</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">a) Salary as per provisions contained in Sec.17(1)</td><td><span>Rs.</span> <?php echo form_input(array('value'=>$query1->total,'readonly'=>'true')); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">b) Value of perquisites u/s 17(2) (as Form No.12BA, wherever applicable)</td><td><span>Rs.</span> <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">c) Profits in lieu of salary under section 17(3)(as per Form No.12BA, wherever applicable)</td><td><span>Rs.</span>  <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">d) Total</td><td>&nbsp;</td><td>Rs. <?php echo form_input ('mname','','style="width:150px"'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">2. Less Allowance to the extent exempt u/s 10</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2"><?php echo form_input('mname','','style="width:200px"'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2"><?php echo form_input('mname','','style="width:200px"'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">3. Balance(1-2)</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">4. Deductions:</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">(a) Entertainment allowance</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">(b) Tax on employment</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">5. Aggregate of 4(a) and(b)</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">6. Income chargeable under the head salaries (3-5)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td></tr>
<tr><td colspan="2">7. Add: Any other income reported by the employee</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2"><?php echo form_input('mname','','style="width:200px"'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2"><?php echo form_input('mname','','style="width:200px"'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname','','style="width:150px;"'); ?></td></tr>
<tr><td colspan="2">8. Gross total income(6+7)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">9. Deduction under Chapter VI-A</td><td>Gross</td><td>Deduction</td><td>&nbsp;</td></tr>
<tr><td colspan="2">(A) Section 80C,80CCC and 80CCD</td><td>Amount</td><td>Amount</td><td>&nbsp;</td></tr>
<tr><td colspan="2">(a) Section 80C</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">i) GPF/PF. <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">ii) GIS <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">iii) LIC <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">iV) ULIP <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">V) Repayment of House Loan <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">Vi) Tution Fee <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">Vii) NSC <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">Viii) Accrued Interest on NSC <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">ix) Bank Deposit Scheme <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">X) PPF <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">Xi) Any Other <div class="pull-right">Rs. <?php echo form_input('mname','','style="width:150px"'); ?><div></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">(b)Section 80CCC</td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">(c)Section 80CCD</td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="5">Note:</td></tr>
<tr><td colspan="5">1. Aggregate amount deductible under section 80-C shall not exceed one Lakh rupees</td></tr>
<tr><td colspan="5">2. Aggregate amount deductible under three sections i.e. 80C, 80CCC, and 80CCD shall not exceed one Lakh rupees</td></tr>
</div>
<div class="back_page" id="divToPrint1">
<tr><td colspan="2">(B) Other section (e.g. 80E,80G etc.)under Chapter VIA </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">Gross<br/>Amount</td><td>Qualifying<br/>Amount</td><td>Deductible<br/>Amount</td><td>&nbsp;</td></tr>
<tr><td colspan="2">(i) section <?php echo form_input('mname','','style="width:100px"'); ?> Rs.  <?php echo form_input('mname'); ?> </td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">(ii) section <?php echo form_input('mname','','style="width:100px"'); ?> Rs.  <?php echo form_input('mname'); ?> </td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">(iii) section <?php echo form_input('mname','','style="width:100px"'); ?> Rs.  <?php echo form_input('mname'); ?> </td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">(iv) section <?php echo form_input('mname','','style="width:100px"'); ?> Rs.  <?php echo form_input('mname'); ?> </td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">(v) section <?php echo form_input('mname','','style="width:100px"'); ?> Rs.  <?php echo form_input('mname'); ?> </td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">10. Aggregate of deductible amount under Chapter VI A</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs.  <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">11. Total Income(8-10)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">12. Tax on total income</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">13. Surcharge (on tax at S.No 12)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">14. Education Cess (on tax at S.No 12 and Surchage at S.No 13)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">15. Tax payable(12+13+14)</td><td><td>&nbsp;</td></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">16. Relief under section 89(attach details)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">17. Tax Payable(15-16)</td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2">18. Less: a) tax deducted at source u/s 192(1)</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="2">b) Tax paid by the employer on behalf of the employee u/s 192(1A) on perquisites u/s 17(2)</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td><td>&nbsp;</td></tr>
<tr><td colspan="2">19. Tax payable/Refundable(17-18)</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td><td>Rs. <?php echo form_input('mname'); ?></td></tr>
<tr><td colspan="2"></td><td>&nbsp;</td><td>&nbsp;</td><td>Rs. <?php echo form_input('mname'); ?></td></tr>

<tr><th colspan="5">DETAILS OF TAX DEDUCTED AND DEPOSITED INTO CENTRAL GOVERMENT ACCOUNT</th></tr>
<tr><th colspan="5"> (The Employer is to provide transcation-wise details of tax deducted and deposited)</th></tr>
<tr>
    <td colspan="5">
        <table class="table table-bordered table_input">
            <tr><td>S.No.</td><td>TDS<br/>Rs. </td><td>Surcharge<br />Rs. </td><td>Education<br/>Cess<br/>Rs. </td><td>Total Tax<br/>Deposited<br/>Rs. </td><td>Cheque/DD<br/>No.(if any)</td><td>BSR Code of<br/>Bank Branch</td><td>Date on which<br/>tax deposited<br/>(dd/mm/yy)</td><td>Transfer<br/>Voucher/Challan<br/>Identification No.</td></tr>
            <?php for($i=1;$i<=11;$i++) {?>
            <tr><td><?php echo $i;?></td>
                <td><?php echo form_input('tds_$i'); ?></td>
                <td><?php echo form_input('surcharge_$i'); ?></td>
                <td><?php echo form_input('education_$i'); ?></td>
                <td><?php echo form_input('totaltax_$i'); ?></td>
                <td><?php echo form_input('cheque_$i'); ?></td>
                <td><?php echo form_input('bsr_$i'); ?></td>
                <td><?php echo form_input('date_$i'); ?></td>
                <td><?php echo form_input('transfer_$i'); ?></td>
            </tr>
            <?php }?>
        </table>
    </td>
</tr>
<tr><th colspan="5" class="text-center">VERFICATION</th></tr>
<tr><td colspan="5"><p>I, <?php echo ucfirst($query->firstname); ?> son/daughter of <?php echo ucfirst($query->fathername); ?> working in the capacity of .........(designation) do hereby certify that a sum of Rs. ...(Rupees....(in words) has been deducted at source and paid to the credit of the central goverment. i further certify that the information given above is true and correct based on the book of accounts, documents and other available records.</p></td></tr>
<tr><td colspan="5" class="text-right">....................................................</td></tr>
<tr><td colspan="5" class="text-right">Signature of the person responsible for deduction of Tax</td></tr>
<tr><td colspan="2">Place: <?php echo $query->city; ?></td><td colspan="2">Full Name</td><td><?php echo ucfirst($query->firstname); ?></td></tr>
<tr><td colspan="2">Date:</td><td colspan="2">Designation</td><td>&nbsp;</td></tr>

</table>
</div>
<input onclick="PrintDiv();" type="button" value="Print Front Page" class="btn btn-primary">
<input onclick="PrintDiv1();" type="button" value="Print Back Page" class="btn btn-primary">
</form>
            

<?php $string = '</div></div>';
echo form_close($string);?>