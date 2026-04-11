<div class="col-12">
    <center>
        <h1 class="text-center text-success"><?php
        if(isset($_GET['generateCoupon'])){
            echo $_GET['generateCoupon'];
        }
        
        ?></h1>
    </center>
    <form action="scripts/addCoupon.php" method="POST" class="mt-4">
        <input type="hidden" name="sellerId" value="<?php echo $sellerId; ?>">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="couponNo" class="form-label">Coupon No</label>
                <input type="text" id="couponNo" name="couponNo" class="form-control" placeholder="Enter Coupon Number" required style="text-transform: uppercase;">
            </div>
            <div class="col-md-4">
                <label for="genDate" class="form-label">Start Date</label>
                <input type="date" id="genDate" name="genDate" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="expDate" class="form-label">Expiry Date</label>
                <input type="date" id="expDate" name="expDate" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="totalCoupons" class="form-label">Total Number of Coupons</label>
                <input type="number" id="totalCoupons" name="totalCoupons" class="form-control" placeholder="Enter Total Number of Coupons" required>
            </div>
            <div class="col-md-6">
                <label for="discountPercent" class="form-label">Discount Percentage (e.g. 5%, 6%, 10% etc)</label>
                <input type="number" id="discountPercent" name="discountPercent" class="form-control" placeholder="Enter Discount Percentage per Coupon" required>
            </div>
        </div>
        
    
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Coupon</button>
        </div>
    </form>
</div>