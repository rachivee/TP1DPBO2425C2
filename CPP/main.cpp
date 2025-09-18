#include <string>
#include <iostream>
#include <vector>

using namespace std;

#include "Sumisang.cpp"

int main(){
    //create a vector to store Sumisang products
    vector<Sumisang> productsList;

    //add product using setters
    Sumisang p1;
    p1.setcode("SGS21");
    p1.setname("Sumisang_Galaxy_S21");
    p1.setcategory("Mobile");
    p1.setdesc("Flagship_smartphone_from_Sumisang_with_high-end_features.");
    productsList.push_back(p1);
    //add product using parameterized constructor
    Sumisang p2("SMM70F32", "Sumisang_Smart_Monitor_M70F_32_Inch", "Monitor", "A_versatile_monitor_that_doubles_as_a_smart_TV.");
    productsList.push_back(p2);

    int programRunning = 1; //condition to keep the program running
    do{
        //display menu
        cout << "===========================" << endl;
        cout << "| SUMISANG OFFICIAL STORE |" << endl;
        cout << "===========================" << endl;
        cout << "|1| View Products         |" << endl;
        cout << "|2| Add Product           |" << endl;
        cout << "|3| Remove Product        |" << endl;
        cout << "|4| Update Product        |" << endl;
        cout << "|5| Search Product        |" << endl;
        cout << "|9| Exit                  |" << endl;
        cout << "===========================" << endl;

        int selectedOption = 0; //set default option to 0
        cout << "Choose an option: "; //ask user to choose an option
        cin >> selectedOption;
        cout << endl;

        if(selectedOption == 1){ //when user wanna see the products
            cout << "List of Products:" << endl << endl;
            //show all products in the vector
            for(int i = 0; i < productsList.size(); i++){ //iterate through the vector
                cout << "[" << i+1 << "] "; //product number
                cout << productsList[i].getcode(); //product code
                cout << " | " << productsList[i].getname(); //product name
                cout << " | " << productsList[i].getcategory() << endl; //product category
                cout << "    " << productsList[i].getdesc() << endl << endl; //product description
            }
        } else if(selectedOption == 2){ //when user wanna add product
            string code, name, category, desc; //variables to store user input
            
            //ask user to input product details
            cout << "Enter product code: ";
            cin >> code;
            cout << "Enter product name: ";
            cin >> name;
            cout << "Enter product category: "; 
            cin >> category;
            cout << "Enter product description: ";
            cin >> desc;
            cout << endl;
            
            //create a new Sumisang object and add it to the vector
            Sumisang px(code, name, category, desc);
            productsList.push_back(px);

            //confirm to user that product has been added
            cout << "Product added successfully!" << endl << endl;

        } else if(selectedOption == 3){ //when user wanna remove product
            string removeCode; //variable to store user input
            
            //ask user to input product code to remove
            cout << "Enter the product code to remove: ";
            cin >> removeCode;

            int found = 0; //flag to check if product is found
            for(int i = 0; i < productsList.size(); i++){ //iterate through the vector
                if(productsList[i].getcode() == removeCode){ //if product code matches
                    productsList.erase(productsList.begin() + i); //remove the product from the vector
                    found = 1; //set flag to true
                }
            }

            //result of the removal process
            if(found == 0){ //if product not found
                cout << "Product with code " << removeCode << " not found." << endl << endl; //notify user
            }else{ //if product found and removed
                cout << "Product with code " << removeCode << " has been removed." << endl << endl; //notify user
            }
        } else if(selectedOption == 4){ //when user wanna update product
            string updateCode; //variable to store user input
            
            //ask user to input product code to update
            cout << "Enter the product code to update: ";
            cin >> updateCode;

            int found = 0; //flag to check if product is found
            for(int i = 0; i < productsList.size(); i++){ //iterate through the vector
                if(productsList[i].getcode() == updateCode){ //if product code matches
                    //ask user to input new product details
                    string newName, newCategory, newDesc;
                    cout << "Enter new product name: ";
                    cin >> newName;
                    cout << "Enter new product category: "; 
                    cin >> newCategory;
                    cout << "Enter new product description: ";
                    cin >> newDesc;
                    cout << endl;
                    //update the product details using setters for name, category, and description
                    productsList[i].setname(newName);
                    productsList[i].setcategory(newCategory);
                    productsList[i].setdesc(newDesc);
                    //set flag to true
                    found = 1;
                }
            }

            //result of the update process
            if(found == 0){ //if product not found
                cout << "Product with code " << updateCode << " not found." << endl << endl;
            }else{ //if product found and updated
                cout << "Product with code " << updateCode << " has been updated." << endl << endl;
            }
        }else if(selectedOption == 5){ //when user wanna search product
            string searchCode; //variable to store user input
            
            //ask user to input product code to search
            cout << "Enter the product code to search: ";
            cin >> searchCode;
            cout << endl;

            int found = 0; //flag to check if product is found
            for(int i = 0; i < productsList.size(); i++){ //iterate through the vector
                if(productsList[i].getcode() == searchCode){ //if product code matches
                    //display the product details
                    cout << "Product found:" << endl;
                    cout << "| Code: " << productsList[i].getcode() << endl; //product code
                    cout << "| Name: " << productsList[i].getname() << endl; //product name
                    cout << "| Category: " << productsList[i].getcategory() << endl; //product category
                    cout << "| Description: " << productsList[i].getdesc() << endl << endl; //product description
                    found = 1; //set flag to true
                }
            }

            //result of the search process
            if(found == 0){ //if product not found
                cout << "Product with code " << searchCode << " not found." << endl << endl;
            }
        }else if(selectedOption == 9){ //when user wanna exit the program
            programRunning = 0; //change the condition to false
            cout << "Thank you for visiting the Sumisang Official Store!" << endl;
            cout << "Copyright 1995-2025 Sumisang. All rights reserved." << endl;
        }else{ //error handling
            cout << "Invalid option. Please try again." << endl;
        }
    }while(programRunning == 1);

    return 0;
}