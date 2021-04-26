/**
 * @file singleton.cpp
 * @author Łukasz (l.przezdziek@gmail.com)
 * @brief 
 * @version 0.1
 * @date 2021-04-21
 * 
 * @copyright Copyright (c) 2021
 * 
 */

#include <iostream>
#include <string>

using namespace std;
/**
 * @brief simple singleton class
 * 
 */
class db
{
private:
    string value;
    static db *instance;

protected:
    /**
 * @brief Construct a new db object must be protected to avoid make new instances outside class
 * 
 */
    db();
    ~db();

public:
    db(string value)
    {
        this->value = value;
    }

    string getValue()
    {
        return this->value;
    }

    void setValue(string value)
    {
        this->value = value;
    }

    static db *getInstance(const string &value)
    {
        if (instance == nullptr)
        {
            instance = new db(value);
        }

        if (instance->getValue() != value)
            instance->setValue(value);
        return instance;
    }
};

/**
 * @brief In cpp static fields are global so they should be defined outside the class
 * 
 */
db *db::instance = nullptr;

int main()
{
    /**
     * @brief define two handle to one instance od db class
     * 
     */
    db *db1 = db::getInstance("some value");
    db *db2 = db::getInstance("very nice value");

    cout << db1->getValue() << endl; //very nice value
    cout << db2->getValue() << endl; //very nice value

    system("pause");
}