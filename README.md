# order-tracker
Utility site for tracking of unordered/ordered/received issues of series of products.

## Core setup:
### Data types:
* Lines - these are product lines; they simply have a name.
* Items - specific items in a product line. They have the following fields:
  * title - title of the specific issue; often a product number.
  * line - ID of the line used. Has to reference Line item.
  * ordered_by - JSON field containing a list of names of those who have ordered this item.
  * state: String, either "unordered", "ordered" or "received".
  
### Views:
* line - Shows a list of all lines, ordered alphabetically. Each simply is a link to their associated items page.
* item - Shows a list of all items associated with the specific line, ordered by creation date descending (newer further up). Each item has a button to advance the state. At top, also has a button to add a new item.
* create-item - Field to create a new item. Simple form with fields for title and ordered_by. Both are autofilled, resp. with most recent title +1 and the same ordered_by as the previous.
* edit_item - Field to edit an item's ordered_by and title fields and button to delete the item.
