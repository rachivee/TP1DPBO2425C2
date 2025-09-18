from Sumisang import Sumisang

def main():
    # List to store products
    products_list = []

    # Creating the initial products
    p1 = Sumisang("SGS21", "Sumisang_Galaxy_S21", "Mobile", "Flagship_smartphone_from_Sumisang_with_high-end_features.")
    products_list.append(p1)
    products_list.append(Sumisang("SMM70F32", "Sumisang_Smart_Monitor_M70F_32_Inch", "Monitor", "A_versatile_monitor_that_doubles_as_a_smart_TV."))

    program_running = True

    # Main loop
    while program_running:
        # Display menu
        print("===========================")
        print("| SUMISANG OFFICIAL STORE |")
        print("===========================")
        print("|1| View Products         |")
        print("|2| Add Product           |")
        print("|3| Remove Product        |")
        print("|4| Update Product        |")
        print("|5| Search Product        |")
        print("|9| Exit                  |")
        print("===========================")

        selected_option = int(input("Choose an option: "))

        # Handle user selection
        if selected_option == 1: # View Products
            print("\nList of Products:\n") # View Products
            for i, prod in enumerate(products_list):
                # Display product details
                print(f"[{i + 1}] {prod.getcode()} | {prod.getname()} | {prod.getcategory()}")
                print(f"    {prod.getdesc()}\n")

        elif selected_option == 2: # Add Product
            # Gather product details
            code = input("\nEnter Product code: ")
            name = input("Enter Product name: ")
            category = input("Enter Product category: ")
            desc = input("Enter Product description: ")
            # Create and add the new product
            new_product = Sumisang(code, name, category, desc)
            products_list.append(new_product)
            # Display success message
            print("\nProduct added successfully!\n")

        elif selected_option == 3: # Remove Product
            remove_code = input("\nEnter the product code to remove: ")
            found = False
            for i, prod in enumerate(products_list): 
                # Check for matching product code
                if prod.code == remove_code:
                    products_list.pop(i) # Remove the product
                    found = True

            if found: # Display success message
                print(f"Product with code {remove_code} has been removed.\n")
            else: # Display not found message
                print(f"Product with code {remove_code} not found.\n")

        elif selected_option == 4: # Update Product
            # Gather product code to update
            update_code = input("\nEnter the product code to update: ")
            found = False
            for prod in products_list:
                if prod.code == update_code:
                    # Gather new product details
                    new_name = input("Enter new product name: ")
                    new_category = input("Enter new product category: ")
                    new_desc = input("Enter new product description: ")
                    # Update product details
                    prod.name = new_name
                    prod.category = new_category
                    prod.desc = new_desc

                    found = True

            if found: # Display success message
                print(f"Product with code {update_code} has been updated.\n")
            else: # Display not found message
                print(f"Product with code {update_code} not found.\n")

        elif selected_option == 5: # Search Product
            # Gather product code to search
            search_code = input("\nEnter the product code to search: ")
            found = False
            for prod in products_list:
                # Check for matching product code
                if prod.getcode() == search_code:
                    # Display product details
                    print("\nProduct found:")
                    print(f"| Code: {prod.getcode()}")
                    print(f"| Name: {prod.getname()}")
                    print(f"| Category: {prod.getcategory()}")
                    print(f"| Description: {prod.getdesc()}")
                    print()
                    found = True

            if not found: # Display not found message
                print(f"Product with code {search_code} not found.\n")

        elif selected_option == 9: # Exit
            program_running = False # Exit the program
            # Display exit message
            print("\nThank you for visiting the Sumisang Official Store!")
            print("Copyright 1995-2025 Sumisang. All rights reserved.\n")

        else: # Invalid option
            print("\nInvalid Option. Please try again.\n") 


if __name__ == "__main__":
    main()

