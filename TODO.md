# TODO: Implement Purchase Creation and Display

## Tasks
- [ ] Implement the `store` method in `PurchaseController` to validate and save purchase data to the database, including purchase details.
- [ ] Ensure purchases are displayed on the purchases index table after creation.
- [ ] Test the functionality by creating a purchase and verifying it appears in the table.

## Details
- Add validation for form inputs (no_nota, tgl_nota, id_distributor, products array).
- Use database transaction to save Purchase and Purchase_Detail records.
- Calculate total_bayar from subtotals server-side.
- Redirect to index with success message.
- The index view already fetches and displays purchases with distributor info.
