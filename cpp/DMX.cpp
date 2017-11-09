#include <stdlib.h>
#include <unistd.h>
#include <ola/DmxBuffer.h>
#include <ola/Logging.h>
#include <ola/client/StreamingClient.h>
#include <iostream>

#include <map>


#include <phpcpp.h>

using namespace std;



class DMX : public Php::Base {

    private:
        static const unsigned int UNIVERSE = 0; // UNIVERSE to use for sending data

    public:
        static void sendChannel(Php::Parameters &params){

            map<int, int> channels = params.channels;
            ola::InitLogging(ola::OLA_LOG_WARN, ola::OLA_LOG_STDERR);
            ola::DmxBuffer buffer; // A DmxBuffer to hold the data.
            buffer.Blackout(); // Set all channels to 0


            // Create a new client.
            ola::client::StreamingClient ola_client(
            (ola::client::StreamingClient::Options()));

            // Setup the client, this connects to the server
            if (!ola_client.Setup()) {
                std::cerr << "Setup failed" << endl;
                exit(1);
            }


            for (auto const& x : channels)
            {

                buffer.SetChannel(x.key, x.);
            }

            if (!ola_client.SendDmx(UNIVERSE, buffer)) {
                cout << "Send DMX failed" << endl;
                exit(1);
            }

        }

        static void blackout(){
            ola::InitLogging(ola::OLA_LOG_WARN, ola::OLA_LOG_STDERR);
            ola::DmxBuffer buffer; // A DmxBuffer to hold the data.
            buffer.Blackout(); // Set all channels to 0


            // Create a new client.
            ola::client::StreamingClient ola_client(
                (ola::client::StreamingClient::Options()));

            // Setup the client, this connects to the server
            if (!ola_client.Setup()) {
                std::cerr << "Setup failed" << endl;
                exit(1);
            }


            if (!ola_client.SendDmx(UNIVERSE, buffer)) {
                cout << "Send DMX failed" << endl;
                exit(1);
            }
        }

        static void noBlackout(){
            map <int, int> c;

            for(int i = 0; i<=512; i++){
                c.insert(pair <int, int> (i, 255));
            }
            sendChannel(c);
        }

};

int main(int, char *[]){
    map <int, int> c;        // empty map container

    // insert elements in random order
    c.insert(pair <int, int> (1, 40));
    c.insert(pair <int, int> (2, 30));
    c.insert(pair <int, int> (3, 60));
    c.insert(pair <int, int> (4, 20));
    c.insert(pair <int, int> (5, 50));
    c.insert(pair <int, int> (6, 50));
    c.insert(pair <int, int> (7, 10));

    DMX::sendChannel(c);

    DMX::blackout();

    DMX::noBlackout();
}


/**
 *  tell the compiler that the get_module is a pure C function
 */
extern "C" {

    /**
     *  Function that is called by PHP right after the PHP process
     *  has started, and that returns an address of an internal PHP
     *  strucure with all the details and features of your extension
     *
     *  @return void*   a pointer to an address that is understood by PHP
     */
    PHPCPP_EXPORT void *get_module()
    {
        // static(!) Php::Extension object that should stay in memory
        // for the entire duration of the process (that's why it's static)
        static Php::Extension extension("DMX", "1.0");

        Php::Class<DMX> dmx("DMX");
        dmx.method<&DMX::sendChannel> ("sendChannel", {Php::ByVal("channels", Php::Type::Array)});
        counter.method<&DMX::blackout> ("blackout");
        counter.method<&DMX::noBlackout>    ("noBlackout");

        // add the class to the extension
        myExtension.add(std::move(counter));

        // return the extension
        return extension;
    }
}
