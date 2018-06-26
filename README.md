# magento2-fix-discount-rules
If you try to create a new discount rule in Magento 2, you'll see a condition called "Payment Method" there. This condition means that the discount will be applied in case a customer selects a certain payment method. But actually, this rule will not work due to a small omission in Magento 2 checkout. The module in the repo fixes the issue.
## How to install:
* Create folder 'app/code/MagestyApps/FixRules/' in you Magento setup
* Extract the repo files to the folder
* Open console (terminal)
* In the console (terminal) navigate to your magento root folder:
   ```
   cd /path/to/your/magento
   ```
  
* Install the new module using the command below:
   ```
   php bin/magento setup:upgrade
   ```

## Description
You can find some code explanations in our blog post: ["Cart Price Rules Based on Payment Method Don't Work"](https://www.magestyapps.com/blog/post/issue-cart-price-rules-based-on-payment-method-dont-work/)
