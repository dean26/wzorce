/**
 * @file proxy.cpp
 * @author Łukasz (l.przezdziek@gmail.com)
 * @brief 
 * @version 0.1
 * @date 2021-04-27
 * 
 * @copyright Copyright (c) 2021
 * 
*/

#include <iostream>
#include <string>

using namespace std;

/**
 * @brief simple abstract class for files
 * 
 */
class File{
    protected:
        string path_to_file;
    public:
        virtual string getPath_to_file() = 0;
        virtual void setPath_to_file(string path) = 0;
};

/**
 * @brief image class for image files
 * 
 */
class Image : File
{
    public:
        string getPath_to_file(){
            return this->path_to_file;
        }
        void setPath_to_file(string path_to_file){
            this->path_to_file = path_to_file;
        }
};

/**
 * @brief proxy class to add override functionality in base Image class
 * 
 */
class ProxyImage
{
    private:
        Image *image;
    public:
        ProxyImage(Image *image){
            this->image = image;
        }
        string getPath_to_file(){
            return "image: " + this->image->getPath_to_file();
        }

};

int main()
{
    Image *banner = new Image();
    banner->setPath_to_file("nice_path_to_jpg");

    ProxyImage proxy = ProxyImage(banner);

    cout << proxy.getPath_to_file() << endl;

    system("pause");
}