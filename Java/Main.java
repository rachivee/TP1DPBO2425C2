
import java.util.Scanner;
import java.util.ArrayList;

class Main{
    public static void main(String[] args){ 
        ArrayList<Sumisang> productsList = new ArrayList<>(); // List to store products
        Scanner input = new Scanner(System.in); // Scanner for user input

        // Adding some initial products to the list using setter
        Sumisang p1 = new Sumisang();
        p1.setCode("SGS21");
        p1.setName("Sumisang_Galaxy_S21");
        p1.setCategory("Mobile");
        p1.setDesc("Flagship_smartphone_from_Sumisang_with_high-end_features.");
        productsList.add(p1);
        // Adding some initial products to the list using parameterized constructor
        productsList.add(new Sumisang("SMM70F32", "Sumisang_Smart_Monitor_M70F_32_Inch", "Monitor", "A_versatile_monitor_that_doubles_as_a_smart_TV."));

        int programRunning = 1; // Control variable for the main loop
        do{
            // Displaying the menu
            System.out.println("===========================");
            System.out.println("| SUMISANG OFFICIAL STORE |");
            System.out.println("===========================");
            System.out.println("|1| View Products         |");
            System.out.println("|2| Add Product           |");
            System.out.println("|3| Remove Product        |");
            System.out.println("|4| Update Product        |");
            System.out.println("|5| Search Product        |");
            System.out.println("|9| Exit                  |");
            System.out.println("===========================");
            // Handling user input
            System.out.print("Choose an option: ");
            int selectedOption = input.nextInt(); // User input only accepts integers

            if(selectedOption == 1){ // View Products
                System.out.println("\nList of Products:\n"); // Displaying the list of products
                // Iterating through the products list and displaying each product's details
                for (int i = 0; i < productsList.size(); i++) {
                    Sumisang prod = productsList.get(i);
                    System.out.println("[" + (i + 1) + "] " + prod.getCode() + " | " + prod.getName() + " | " + prod.getCategory());
                    System.out.println("    " + prod.getDesc() + "\n");
                }
            }else if(selectedOption == 2){ // Add Product
                String code, name, category, desc; // Variables to hold new product details
                // asking user for new product details
                System.out.print("\nEnter Product code: ");
                code = input.next();
                System.out.print("Enter Product name: ");
                name = input.next();
                System.out.print("Enter Product category: ");
                category = input.next();
                System.out.print("Enter Product description: ");
                desc = input.next();
                // Adding the new product to the list using parameterized constructor
                productsList.add(new Sumisang(code, name, category, desc));
                // Confirmation message
                System.out.println("\nProduct added successfully!\n");
            }else if(selectedOption == 3){ // Remove Product
                System.out.print("\nEnter the product code to remove: "); // Asking user for the product code to remove
                String removeCode = input.next(); // Storing the input code
                // Searching for the product in the list
                int found = 0;
                int i = 0;
                while(found == 0 && i < productsList.size()){ // Loop until the product is found or end of list is reached
                    if(productsList.get(i).getCode().equals(removeCode)){ // If product code matches
                        productsList.remove(i); // Remove the product from the list
                        found = 1; // Set found to 1 to indicate the product was found
                    }
                    i++; // Increment the index
                }

                if(found == 0){ // If product was not found
                    System.out.println("Product with code " + removeCode + " not found.\n"); // Displaying not found message
                }else{ // If product was found and removed
                    System.out.println("Product with code " + removeCode + " has been removed.\n"); // Displaying success message
                }
            }else if(selectedOption == 4){ // Update Product
                System.out.print("\nEnter the product code to update: "); // Asking user for the product code to update
                String updateCode = input.next(); // Storing the input code
                // Searching for the product in the list
                int found = 0;
                int i = 0;
                while(found == 0 && i < productsList.size()){ // Loop until the product is found or end of list is reached
                    if(productsList.get(i).getCode().equals(updateCode)){ // If product code matches
                        String newName, newCategory, newDesc; // Variables to hold new product details
                        // Asking user for new product details
                        System.out.print("Enter new product name: ");
                        newName = input.next();
                        System.out.print("Enter new product category: ");
                        newCategory = input.next();
                        System.out.print("Enter new product description: ");
                        newDesc = input.next();
                        // Updating the product details using setter methods
                        productsList.get(i).setName(newName);
                        productsList.get(i).setCategory(newCategory);
                        productsList.get(i).setDesc(newDesc);
                        // Setting found to 1 to indicate the product was found
                        found = 1;
                    }
                    i++;
                }

                if(found == 0){ // If product was not found
                    System.out.println("Product with code " + updateCode + " not found.\n"); // Displaying not found message
                }else{ // If product was found and updated
                    System.out.println("Product with code " + updateCode + " has been updated.\n"); // Displaying success message
                }
            }else if(selectedOption == 5){ // Search Product
                System.out.print("\nEnter the product code to search: "); // Asking user for the product code to search
                String searchCode = input.next(); 

                int found = 0;
                int i = 0;
                while(found == 0 && i < productsList.size()){ // Loop until the product is found or end of list is reached
                    if(productsList.get(i).getCode().equals(searchCode)){ // If product code matches
                        // Displaying the product details
                        System.out.println("\nProduct found:");
                        System.out.println("| Code: " + productsList.get(i).getCode());
                        System.out.println("| Name: " + productsList.get(i).getName());
                        System.out.println("| Category: " + productsList.get(i).getCategory());
                        System.out.println("| Description: " + productsList.get(i).getDesc());
                        System.out.println();
                        found = 1; // Set found to 1 to indicate the product was found
                    }
                    i++;
                }

                if(found == 0){ // If product was not found
                    System.out.println("Product with code " + searchCode + " not found.\n"); // Displaying not found message
                }
            }else if(selectedOption == 9){ // Exit
                programRunning = 0; // Setting control variable to 0 to exit the loop
                // Exit message
                System.out.println("\nThank you for visiting the Sumisang Official Store!");
                System.out.print("Copyright 1995-2025 Sumisang. All rights reserved.\n");
            }else{ // Invalid Option
                System.out.println("\nInvalid Option. Please try again.\n"); // Displaying invalid option message
            }
        }while(programRunning == 1); // Loop continues until programRunning is set to 0
    }
};