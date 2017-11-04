#include <stdlib.h>
#include <unistd.h>
#include <ola/DmxBuffer.h>
#include <ola/Logging.h>
#include <ola/client/StreamingClient.h>
#include <iostream>

#include <map>

class DMX {
    int sendChannel(channels map<int,int>){
        unsigned int universe = 2; // universe to use for sending data

        ola::DmxBuffer buffer; // A DmxBuffer to hold the data.

        // Create a new client.
         ola::client::StreamingClient ola_client(
        (ola::client::StreamingClient::Options()));

        // Setup the client, this connects to the server
        if (!ola_client.Setup()) {
            std::cerr << "Setup failed" << endl;
            exit(1);
        }

        for (auto const& x : symbolTable)
        {
            
            buffer.SetChannel(x.first, x.second);
        }

        if (!ola_client.SendDmx(universe, buffer)) {
            cout << "Send DMX failed" << endl;
            exit(1);
        }
        
    }
};