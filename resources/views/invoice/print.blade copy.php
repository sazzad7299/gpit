<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    
    <title>Invoice</title>
    <style>
      /* Add your custom CSS styles here */
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid black;
        padding: 8px;
      }
      th {
        background-color: #f2f2f2;
        text-align: left;
      }
      .invoice-header {
        display: flex;
        justify-content: space-between;
      }
      .invoice-header h3 {
        margin: 0;
      }
    </style>
  </head>
  <body>
    <div class="invoice-header">
      <div>
        <h3>Company Details</h3>
        <p>Company Name</p>
        <p>Address Line 1</p>
        <p>Address Line 2</p>
        <p>Phone: 1234567890</p>
        <p>Email: company@email.com</p>
      </div>
      <div>
        <h3>Invoice</h3>
        <p>Invoice Number: 12345</p>
        <p>Date: 01/01/2023</p>
        <h3>Customer Details</h3>
        <p>Customer Name</p>
        <p>Address Line 1</p>
        <p>Address Line 2</p>
        <p>Phone: 1234567890</p>
        <p>Email: customer@email.com</p>
      </div>
    </div>
    <hr>
   
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Item 1</td>
          <td>Description for Item 1</td>
          <td>$10</td>
          <td>2</td>
          <td>$20</td>
        </tr>
        <tr>
          <td>Item 2</td>
          <td>Description for Item 2</td>
          <td>$20</td>
          <td>1</td>
          <td>$20</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" align="right">Total:</td>
          <td>$40</td>
        </tr>
        <tr>
            <td colspan="4" align="right">Tax:</td>
            <td>$40</td>
          </tr>

          <tr>
            <td colspan="4" align="right">Payment:</td>
            <td>$40</td>
          </tr>

          <tr>
            <td colspan="4" align="right">Due:</td>
            <td>$40</td>
          </tr>
      </tfoot>
    </table>
  </body>
</html>
